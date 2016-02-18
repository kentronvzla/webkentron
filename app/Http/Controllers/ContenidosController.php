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
            return redirect('contenidos');
        } else {
//            return back()->withInput()->withErrors($contenido->getErrors());
            return response()->json(['errores' => $contenido->getErrors()], 400);
        }
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
