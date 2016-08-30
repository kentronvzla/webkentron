<?php

namespace App\Http\Controllers\Admin\Tablas;

use App\Http\Controllers\Admin\TableBaseController;
use PHPImageWorkshop\ImageWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Contenido;

class ContenidosController extends TableBaseController {

    public function getNuevo(Request $request) {
        $data['nuevo'] = true;
        $data['contenido'] = new Contenido();
        return view("admin.tablas.contenidos.contenidosform", $data);
    }

    public function postNuevo(Request $request) {
        $contenido = Contenido::crear($request->all());
        if (!$contenido->hasErrors()) {
            if ($contenido->save()) {
                $data['contenido'] = $contenido;
                $data['mensaje'] = "Datos guardados correctamente";
                if ($request->ajax()) {
                   return response()->json($data);
                }
                return redirect('admin/tablas/contenidos/modificar/' . $contenido->id)
                    ->with('mensaje', $data['mensaje']);
            } else {
                if ($request->ajax()) {
                    return response()->json(['errores' => $contenido->getErrors()], 400);
                }
                return back()->withInput()->withErrors($contenido->getErrors());
            }
        } else {
            return response()->json(['errores' => $contenido->getErrors()], 400);
        }
    }

    public function postModificar(Request $request) {
        $contenido = Contenido::findOrNew($request->input('id'));
        $contenido->fill($request->all());
        if ($contenido->save()) {
            $data['contenido'] = $contenido;
            $data['mensaje'] = "Datos guardados correctamente";
            if ($request->ajax()) {
                return response()->json($data);
            }
            return redirect('admin/tablas/contenidos/modificar/' . $contenido->id)
                ->with('mensaje', $data['mensaje']);
        } else {
            if ($request->ajax()) {
                return response()->json(['errores' => $contenido->getErrors()], 400);
            }
            return back()->withInput()->withErrors($contenido->getErrors());
        }
    }

    public function getModificar(Request $request, $id = null) {
        if (is_null($id)) {
            $data['nuevo'] = true;
            $data['contenido'] = new Contenido();
        } else {
            $data['nuevo'] = false;
            $data['contenido'] = Contenido::findOrFail($id);
        }
        if ($request->ajax()) {
            return response()->json($data);
        }
        return view("admin.tablas.contenidos.contenidosform", $data);
    }

    public function postSubirfondo(Request $request, $id) {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No hay ningun archivo'], 400);
        }
        list($contenido, $file) = [Contenido::findOrFail($id), $request->file('file')];

        if (empty($mensaje = $this->validarArchivo($contenido, $file))) {
            list($atributos_tip_pub) = [$contenido->tipoPublicaciones->getAttributes()];
            $fileName = $contenido->tipoPublicaciones->getAttributes()['descripcion'] . $contenido->id . "." . $file->getClientOriginalExtension();
            $base_path = 'archivos'
                    . '/' . 'contenidos' 
                    . '/' . $contenido->tipoPublicaciones->getAttributes()['descripcion'];
            $file->move($base_path, $fileName);
            $foto = ImageWorkshop::initFromPath($base_path . '/' . $fileName);
//            $foto->cropMaximumInPixel(0, 0, "MM");
//            $foto->resizeInPixel(160, 160);
            $foto->save($base_path, $fileName);
            if ($contenido->fondo != "") {
                File::delete($base_path . $contenido->fondo);
            }
            $contenido->fondo = $fileName;
            $contenido->save();
            return response()->json(['url' => url($base_path . '/' . $fileName), 'mensaje' => "Datos guardados correctamente"],200);
        } else {
            return response()->json($mensaje, 400);
        }
        
    }

    public function validarArchivo($modelo, $archivo) {
        list($mensaje, $atributos_tip_pub, $datos_imagen) = [[], $modelo->tipoPublicaciones->getAttributes(), getimagesize($archivo)];

        if (!in_array(strtolower($archivo->getClientOriginalExtension()), Contenido::$extensionesImagenes)) {
            $mensaje['mensaje'] = 'Archivo no permitido';
        }

        if ($datos_imagen[0] > $atributos_tip_pub['max_width_img'] || $datos_imagen[1] > $atributos_tip_pub['max_heigth_img']) {
            $mensaje['mensaje'] = 'Tamaño de imagen no permitido';
        }

        if ($archivo->getSize() > 2097152) {
            $mensaje['mensaje'] = 'Archivo demasiado pesado, no puede superar 2MB de tamaño';
        }

        return $mensaje;
    }

}
