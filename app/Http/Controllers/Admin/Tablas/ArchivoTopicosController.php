<?php

namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\ArchivoTopico;

class ArchivoTopicosController extends TableBaseController {

    public function __construct() {
        parent::__construct();
        $this->collectionName = "archivotopicos";
    }

    public function getNuevo(Request $request) {
        $data['nuevo'] = true;
        $data['archivotopico'] = new ArchivoTopico();
        return view("admin.tablas.archivotopicos.archivotopicosform", $data);
    }

    public function postNuevo(Request $request) {
        $archivotopico = ArchivoTopico::crear($request->all());
        if (!$archivotopico->hasErrors()) {
            if ($archivotopico->save()) {
                $data['archivotopico'] = $archivotopico;
                $data['mensaje'] = "Datos guardados correctamente";
                if ($request->ajax()) {
                   return response()->json($data);
                }
                return redirect('admin/tablas/archivotopicos/modificar/' . $archivotopico->id)
                    ->with('mensaje', $data['mensaje']);
            } else {
                if ($request->ajax()) {
                    return response()->json(['errores' => $archivotopico->getErrors()], 400);
                }
                return back()->withInput()->withErrors($archivotopico->getErrors());
            }
        } else {
            return response()->json(['errores' => $archivotopico->getErrors()], 400);
        }
    }

    public function postModificar(Request $request) {
        $archivotopico = ArchivoTopico::findOrNew($request->input('id'));
        $archivotopico->fill($request->all());
        if ($archivotopico->save()) {
            $data['archivotopico'] = $archivotopico;
            $data['mensaje'] = "Datos guardados correctamente";
            if ($request->ajax()) {
                return response()->json($data);
            }
            return redirect('admin/tablas/archivotopicos/modificar/' . $archivotopico->id)
                ->with('mensaje', $data['mensaje']);
        } else {
            if ($request->ajax()) {
                return response()->json(['errores' => $archivotopico->getErrors()], 400);
            }
            return back()->withInput()->withErrors($archivotopico->getErrors());
        }
    }

    public function getModificar(Request $request, $id = null) {
        if (is_null($id)) {
            $data['nuevo'] = true;
            $data['archivotopico'] = new ArchivoTopico();
        } else {
            $data['nuevo'] = false;
            $data['archivotopico'] = ArchivoTopico::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view("admin.tablas.archivotopicos.archivotopicosform", $data);
    }
}
