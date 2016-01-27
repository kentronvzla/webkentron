<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contenido;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // $data['contenido'] = Contenido::findOrFail($id);
        return view('pages.contenido');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            if($contenido -> save()){
                return redirect()->back();
                //return "Se guardado correctamente el contenido.";
            }
            else{
                return "Hubo un error al guardar el contenido.";}
            
//            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
