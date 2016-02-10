<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TableBaseController;
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

    public function create() {
        //
        // $data['contenido'] = Contenido::findOrFail($id);
        return view('admin.contenidos.contenidosform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        
//        Contenido::create([
//        'tipo_publicaciones_id' => $request['tipo_publicaciones_id'],
//        'tipo_fondos_id' => $request['tipo_fondos_id'],
//        'modo_vistas_id' => $request['modo_vistas_id'],
//        'titulo' => $request['titulo'],
//        'resumen' => $request['resumen'],
//        'detalle' => $request['detalle'],
//        'fondo' => $request['fondo'],
//        'url' => $request['url'],
//        'ind_activo' => $request['ind_activo'],
//        'autor' => $request['autor'],
//        'referencia_externa' => $request['referencia_externa'],
//        'fecha_vigencia' => $request['fecha_vigencia'],
//        ]);
        $input = $request->all();

//            Contenido::create($input);            

        $contenido = new Contenido($input);

//        return $contenido->getFillable();
        if ($contenido->save()) {
            return redirect()->back();
//            return "Se guardado correctamente el contenido.";
        } else {
            return "Hubo un error al guardar el contenido.";
        }

//            return redirect()->back();
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
        
        $base_path = 'adjuntos' . DIRECTORY_SEPARATOR . 'contenido' . $contenido->id;
        
        $file->move($base_path, $fileName);
        $foto = PHPImageWorkshop\ImageWorkshop::initFromPath($base_path . DIRECTORY_SEPARATOR . $fileName);
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
