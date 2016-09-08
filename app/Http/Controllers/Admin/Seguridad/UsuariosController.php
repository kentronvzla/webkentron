<?php

namespace App\Http\Controllers\Admin\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TableBaseController;
use App\Usuario;

class UsuariosController extends TableBaseController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Store a newly created resource in storage.
     * Or 
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request) {
        $usuario = Usuario::findOrNew($request->input('id'));
        $usuario->fill($request->all());
        $validacion = $usuario->validate();
        if ($validacion) {
            if ($usuario->save()) {
                $usuario->grupos()->sync($request->input('grupos', []));
                return redirect('admin/seguridad/usuarios')
                                ->with('mensaje', 'Se guardo el usuario correctamente.');
            } else {
                return back()->withInput()->withErrors($usuario->getErrors());
            }
        } else {
            return back()->withInput()->withErrors($usuario->getErrors());
        }
    }

}
