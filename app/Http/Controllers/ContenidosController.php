<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Contenido;

class ContenidosController extends TableBaseController {

    protected $roles;
    protected static $className = "Contenido";
    protected static $collectionName = "contenidos";
    protected static $folderName = 'contenidos';
    protected static $viewName = "contenidos";
    protected static $varName = "contenido";
    protected static $eagerLoading = [];

    public function postNuevo(Request $request) {
        $contenido = Contenido::crear($request->all());
        if (!$contenido->hasErrors()) {
            $request->session()->put('contenido', $contenido->toArray());
            return redirect('contenidos/modificar');
        } else {
//            return back()->withInput()->withErrors($contenido->getErrors());
            return response()->json(['errores' => $contenido->getErrors()], 400);
        }
    }
    
    public function postModificar(Request $request) {
        Session::forget('contenido');
        $contenido = Solicitud::findOrNew($request->input('id'));
        $contenido->fill($request->all());
        if ($contenido->save()) {
            $data['contenido'] = $contenido;
            $data['mensaje'] = "Datos guardados correctamente";
            if (Request::ajax()) {
                return response()->json($data);
            }
            return redirect('contenidos/modificar/' . $contenido->id);
        } else {
            if (Request::ajax()) {
                return response()->json(['errores' => $contenido->getErrors()], 400);
            }
            return back()->withInput()->withErrors($contenido->getErrors());
        }
    }
    
    public function getModificar(Request $request, $id = null) {
        dump($id);
        exit();
        if (is_null($id) && !$request->session()->has('contenido')) {
            $data['nuevo'] = true;
        } else {
            $data['nuevo'] = false;
        }
        if ($request->session()->has('contenido') && is_null($id)) {
            $data['contenido'] = new Solicitud($request->session()->get('contenido'));
        } else {
            $data['contenido'] = Solicitud::findOrFail($id);
        }
        if (Request::ajax()) {
            return response()->json($data);
        }
        return view("contenidos.plantilla", $data);
    }

    public function postSubirfondo($id) {
            if (!Input::hasFile('file')) {
                return response()->json(array('error' => 'No hay ningun archivo'), 400);
            }
            $contenido = Contenido::findOrFail($id);
            $file = Input::file('file');

            if (!in_array(strtolower($file->getClientOriginalExtension()), Contenido::$extensionesImagenes)) {
                return response()->json(array('mensaje' => 'Archivo no permitido'), 400);
            }
            if ($file->getSize() > 1048576) {
                return response()->json(array('mensaje' => 'Archivo demasiado pesado, no puede superar 1MB de tamaño'), 400);
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
            return response()->json(array('url' => url($base_path . DIRECTORY_SEPARATOR . $fileName)));
        }
        
}
