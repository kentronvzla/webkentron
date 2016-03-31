<?php

namespace App\Http\Controllers\Admin\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TableBaseController;
use App\Grupo;
use Sentry;

class GruposController extends TableBaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getModificar(Request $request, $id = null) {
        list($permisosGlobales) = [Grupo::$permisos];
        if ($id == null) {
            list($data['grupo'], $view) = [new Grupo(), 'admin.seguridad.grupos.creargrupos'];
            try {
                $sentryGroup = Sentry::findAllGroups();
            } catch (Exception $ex) {
                $sentryGroup = null;
            }
        } else {
            list($data['grupo'], $view) = [Grupo::find($id), 'admin.seguridad.grupos.gruposform'];
            try {
                $sentryGroup = Sentry::findGroupById($id);
            } catch (Exception $ex) {
                $sentryGroup = null;
            }
        }
        list($data['permisos']) = [$this->cargarPermisos($sentryGroup, $permisosGlobales)];
        return view($view, $data);
    }

    public function cargarPermisos($sentryGroup, $permisosGlobales) {
        if (is_object($sentryGroup)) {
            $data['permisos'] = [];
            foreach ($permisosGlobales as $key => $permiso) {
                list($tiene_acceso) = [false];
                $data['permisos'][$key] = [
                    'Descripcion' => $permiso['Descripcion'],
                ];
                foreach ($permiso as $acceso => $descripcion) {
                    if ($sentryGroup->hasAccess($acceso)) {
                        $data['permisos'][$key][$acceso] = $descripcion;
                        $tiene_acceso = true;
                    }
                }
                if (!$tiene_acceso) {
                    unset($data['permisos'][$key]);
                }
            }
        } else {
            $data['permisos'] = ['' => []];
        }

        return $data['permisos'];
    }
    
    public function postConcederpermiso($idgrupo, $permiso) {
        $sentryGroups = Sentry::findGroupById($idgrupo);
        $permisos = $sentryGroups->getPermissions();
        $permisos[$permiso] = 1;
        $sentryGroups->permissions = $permisos;
        $sentryGroups->save();
        return response()->json(['mensaje' => 'Se concedio el permiso correctamente.']);
    }

    public function postDenegarpermiso($idgrupo, $permiso) {
        $sentryGroups = Sentry::findGroupById($idgrupo);
        $permisos = $sentryGroups->getPermissions();
        $permisos[$permiso] = 0;
        $sentryGroups->permissions = $permisos;
        $sentryGroups->save();
        return response()->json(['mensaje' => 'Se denego el permiso correctamente.']);
    }

}
