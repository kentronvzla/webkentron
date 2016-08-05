<?php

namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Contenido;

class ConocimientosController extends TableBaseController {

    public function getNuevo(Request $request) {
        $data['nuevo'] = true;
        $data['conocimiento'] = new Conocimiento();
        return view("admin.tablas.conocimientos.conocimientosform", $data);
        
    } 

   
}