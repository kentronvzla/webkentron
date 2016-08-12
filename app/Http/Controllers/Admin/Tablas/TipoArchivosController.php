<?php

namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\TipoArchivo;

class TipoArchivosController extends TableBaseController {

    public function getNuevo(Request $request) {
        $data['nuevo'] = true;
        $data['tipoarchivo'] = new TipoArchivo();
        return view("admin.tablas.tipoarchivos.tipoarchivosform", $data);
    }

    public function postNuevo(Request $request) {
        $tipoarchivo = TipoArchivo::crear($request->all());
        if (!$tipoarchivo->hasErrors()) {
            if ($tipoarchivo->save()) {
                $data['tipoarchivo'] = $tipoarchivo;
                $data['mensaje'] = "Datos guardados correctamente";
                if ($request->ajax()) {
                   return response()->json($data);
                }
                return redirect('admin/tablas/tipoarchivos/modificar/' . $tipoarchivo->id)
                    ->with('mensaje', $data['mensaje']);
            } else {
                if ($request->ajax()) {
                    return response()->json(['errores' => $tipoarchivo->getErrors()], 400);
                }
                return back()->withInput()->withErrors($tipoarchivo->getErrors());
            }
        } else {
            return response()->json(['errores' => $tipoarchivo->getErrors()], 400);
        }
    }

    public function postModificar(Request $request) {
        $tipoarchivo = TipoArchivo::findOrNew($request->input('id'));
        $tipoarchivo->fill($request->all());
        if ($tipoarchivo->save()) {
            $data['tipoarchivo'] = $tipoarchivo;
            $data['mensaje'] = "Datos guardados correctamente";
            if ($request->ajax()) {
                return response()->json($data);
            }
            return redirect('admin/tablas/tipoarchivos/modificar/' . $tipoarchivo->id)
                ->with('mensaje', $data['mensaje']);
        } else {
            if ($request->ajax()) {
                return response()->json(['errores' => $tipoarchivo->getErrors()], 400);
            }
            return back()->withInput()->withErrors($tipoarchivo->getErrors());
        }
    }

    public function getModificar(Request $request, $id = null) {
        if (is_null($id)) {
            $data['nuevo'] = true;
            $data['tipoarchivo'] = new TipoArchivo();
        } else {
            $data['nuevo'] = false;
            $data['tipoarchivo'] = TipoArchivo::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view("admin.tablas.tipoarchivos.tipoarchivosform", $data);
    }
}
