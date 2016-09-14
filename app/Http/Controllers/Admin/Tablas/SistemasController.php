<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Sistema;

class SistemasController extends TableBaseController {

    public function getNuevo(Request $request) {
        $data['nuevo'] = true;
        $data['sistema'] = new Sistema();
        return view("admin.tablas.sistemas.sistemasform", $data);
    }

    public function postNuevo(Request $request) {
        $sistema = Sistema::crear($request->all());
        if (!$sistema->hasErrors()) {
            if ($sistema->save()) {
                $data['sistema'] = $sistema;
                $data['mensaje'] = "Datos guardados correctamente";
                if ($request->ajax()) {
                   return response()->json($data);
                }
                return redirect('admin/tablas/sistemas/modificar/' . $sistema->id)
                    ->with('mensaje', $data['mensaje']);
            } else {
                if ($request->ajax()) {
                    return response()->json(['errores' => $sistema->getErrors()], 400);
                }
                return back()->withInput()->withErrors($sistema->getErrors());
            }
        } else {
            return response()->json(['errores' => $sistema->getErrors()], 400);
        }
    }

    public function postModificar(Request $request) {
        $sistema = Sistema::findOrNew($request->input('id'));
        $sistema->fill($request->all());
        if ($sistema->save()) {
            $data['sistema'] = $sistema;
            $data['mensaje'] = "Datos guardados correctamente";
            if ($request->ajax()) {
                return response()->json($data);
            }
            return redirect('admin/tablas/sistemas/modificar/' . $sistema->id)
                ->with('mensaje', $data['mensaje']);
        } else {
            if ($request->ajax()) {
                return response()->json(['errores' => $sistema->getErrors()], 400);
            }
            return back()->withInput()->withErrors($sistema->getErrors());
        }
    }

    public function getModificar(Request $request, $id = null) {
        if (is_null($id)) {
            $data['nuevo'] = true;
            $data['sistema'] = new Sistema();
        } else {
            $data['nuevo'] = false;
            $data['sistema'] = Sistema::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view("admin.tablas.sistemas.sistemasform", $data);
    }
}
