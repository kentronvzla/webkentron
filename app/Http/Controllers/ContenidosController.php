<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TableBaseController;
use Illuminate\Http\Request;
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

        //return $contenido->getFillable();
        if ($contenido->save()) {
            return redirect()->back();
            //return "Se guardado correctamente el contenido.";
        } else {
            return "Hubo un error al guardar el contenido.";
        }

//            return redirect()->back();
    }

}
