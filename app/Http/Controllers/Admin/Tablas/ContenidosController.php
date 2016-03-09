<?php

namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Contenido;

class ContenidosController extends TableBaseController {

//    protected $roles;
//    protected static $className = "Contenido";
//    protected static $collectionName = "contenidos";
//    protected static $folderName = 'contenidos';
//    protected static $viewName = "contenidos";
//    protected static $varName = "contenido";
//    protected static $eagerLoading = [];

    public function getNuevo(Request $request) {
        $request->session()->forget('contenido');
        $data['nuevo'] = true;
        $data['contenido'] = new Contenido();
        return View::make("admin.tablas.contenidos.contenidosform", $data);
    }

    public function postNuevo(Request $request) {
        $contenido = Contenido::crear($request->all());
        if (!$contenido->hasErrors()) {
            $request->session()->put('contenido', $contenido->toArray());
            if ($contenido->save()) {
                $data['contenido'] = $contenido;
                $data['mensaje'] = "Datos guardados correctamente";
                if ($request->ajax()) {
                    return response()->json($data);
                }
                $request->session()->forget('contenido');
                return redirect('admin/tablas/contenidos/modificar/' . $contenido->id);
            } else {
                if ($request->ajax()) {
                    return response()->json(['errores' => $contenido->getErrors()], 400);
                }
                return back()->withInput()->withErrors($contenido->getErrors());
            }
        } else {
            return response()->json(['errores' => $contenido->getErrors()], 400);
        }
    }

    public function postModificar(Request $request) {
        $request->session()->forget('contenido');
        $contenido = Contenido::findOrNew($request->input('id'));
        $contenido->fill($request->all());
        if ($contenido->save()) {
            $data['contenido'] = $contenido;
            $data['mensaje'] = "Datos guardados correctamente";
            if ($request->ajax()) {
                return response()->json($data);
            }
            return redirect('admin/tablas/contenidos/modificar/' . $contenido->id);
        } else {
            if ($request->ajax()) {
                return response()->json(['errores' => $contenido->getErrors()], 400);
            }
            return back()->withInput()->withErrors($contenido->getErrors());
        }
    }

    public function getModificar(Request $request, $id = null) {
        if (is_null($id) && !$request->session()->has('contenido')) {
            $data['nuevo'] = true;
            $data['contenido'] = new Contenido();
        } else if (is_null($id) && $request->session()->has('contenido')) {
            $data['nuevo'] = true;
            $data['contenido'] = new Contenido($request->session()->get('contenido'));
        } else {
            $data['nuevo'] = false;
            $data['contenido'] = Contenido::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view("admin.tablas.contenidos.contenidosform", $data);
    }

    public function postSubirfondo($id) {
        if (!Input::hasFile('file')) {
            return response()->json(['error' => 'No hay ningun archivo'], 400);
        }
        $contenido = Contenido::findOrFail($id);
        $file = Input::file('file');

        if (!in_array(strtolower($file->getClientOriginalExtension()), Contenido::$extensionesImagenes)) {
            return response()->json(['mensaje' => 'Archivo no permitido'], 400);
        }
        if ($file->getSize() > 1048576) {
            return response()->json(['mensaje' => 'Archivo demasiado pesado, no puede superar 1MB de tamaño'], 400);
        }
        $fileName = 'Fondo.' . $file->getClientOriginalExtension();

        $base_path = 'uploads' . DIRECTORY_SEPARATOR . 'contenido' . $contenido->id;

        $file->move($base_path, $fileName);
        $foto = ImageWorkshop::initFromPath($base_path . DIRECTORY_SEPARATOR . $fileName);
        $foto->cropMaximumInPixel(0, 0, "MM");
        $foto->resizeInPixel(160, 160);
        $foto->save($base_path, $fileName);
        if ($contenido->fondo != "") {
            File::delete($base_path . $contenido->fondo);
        }
        $contenido->fondo = $fileName;
        $contenido->save();
        return response()->json(['url' => url($base_path . DIRECTORY_SEPARATOR . $fileName)]);
    }

}
