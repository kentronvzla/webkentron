<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Categoria;

class CategoriasController extends TableBaseController {

    public function getNuevo(Request $request) {
        $data['nuevo'] = true;
        $data['categoria'] = new Categoria();
        return view("admin.tablas.categorias.categoriasform", $data);
    }

    public function postNuevo(Request $request) {
        $categoria = Categoria::crear($request->all());
        if (!$categoria->hasErrors()) {
            if ($categoria->save()) {
                $data['categoria'] = $categoria;
                $data['mensaje'] = "Datos guardados correctamente";
                if ($request->ajax()) {
                   return response()->json($data);
                }
                return redirect('admin/tablas/categorias/modificar/' . $categoria->id)
                    ->with('mensaje', $data['mensaje']);
            } else {
                if ($request->ajax()) {
                    return response()->json(['errores' => $categoria->getErrors()], 400);
                }
                return back()->withInput()->withErrors($categoria->getErrors());
            }
        } else {
            return response()->json(['errores' => $categoria->getErrors()], 400);
        }
    }

    public function postModificar(Request $request) {
        $categoria = Categoria::findOrNew($request->input('id'));
        $categoria->fill($request->all());
        if ($categoria->save()) {
            $data['categoria'] = $categoria;
            $data['mensaje'] = "Datos guardados correctamente";
            if ($request->ajax()) {
                return response()->json($data);
            }
            return redirect('admin/tablas/categorias/modificar/' . $categoria->id)
                ->with('mensaje', $data['mensaje']);
        } else {
            if ($request->ajax()) {
                return response()->json(['errores' => $categoria->getErrors()], 400);
            }
            return back()->withInput()->withErrors($categoria->getErrors());
        }
    }

    public function getModificar(Request $request, $id = null) {
        if (is_null($id)) {
            $data['nuevo'] = true;
            $data['categoria'] = new Categoria();
        } else {
            $data['nuevo'] = false;
            $data['categoria'] = Categoria::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view("admin.tablas.categorias.categoriasform", $data);
    }
}
