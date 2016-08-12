<?php

namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Topico;

class TopicosController extends TableBaseController {

    public function getNuevo(Request $request) {
        $data['nuevo'] = true;
        $data['topico'] = new Topico();
        return view("admin.tablas.topicos.topicosform", $data);
        
    }

    public function postNuevo(Request $request) {
        $topico = Topico::crear($request->all());
        if (!$topico->hasErrors()) {
            if ($topico->save()) {
                $data['topico'] = $topico;
                $data['mensaje'] = "Datos guardados correctamente";
                if ($request->ajax()) {
                   return response()->json($data);
                }
                return redirect('admin/tablas/topicos/modificar/' . $topico->id)
                    ->with('mensaje', $data['mensaje']);
            } else {
                if ($request->ajax()) {
                    return response()->json(['errores' => $topico->getErrors()], 400);
                }
                return back()->withInput()->withErrors($topico->getErrors());
            }
        } else {
            return response()->json(['errores' => $topico->getErrors()], 400);
        }
    }

    public function postModificar(Request $request) {
        $topico = Topico::findOrNew($request->input('id'));
        $topico->fill($request->all());
        if ($topico->save()) {
            $data['topico'] = $topico;
            $data['mensaje'] = "Datos guardados correctamente";
            if ($request->ajax()) {
                return response()->json($data);
            }
            return redirect('admin/tablas/topicos/modificar/' . $topico->id)
                ->with('mensaje', $data['mensaje']);
        } else {
            if ($request->ajax()) {
                return response()->json(['errores' => $topico->getErrors()], 400);
            }
            return back()->withInput()->withErrors($topico->getErrors());
        }
    }

    public function getModificar(Request $request, $id = null) {
        if (is_null($id)) {
            $data['nuevo'] = true;
            $data['topico'] = new Topico();
        } else {
            $data['nuevo'] = false;
            $data['topico'] = Topico::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view("admin.tablas.topicos.topicosform", $data);
    }

}