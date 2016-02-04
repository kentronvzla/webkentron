<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableBaseController extends Controller {

    protected static $namespace = "App\\";
    protected static $className = "";
    protected static $collectionName = "";
    protected static $folderName = "";
    protected static $viewName = "";
    protected static $varName = "";
    protected static $eagerLoading = [];

    public function getIndex() {
        $data['class'][static::$viewName] = "active";
        if (count(static::$eagerLoading) == 0) {
            $data[static::$collectionName] = call_user_func([static::$namespace . static::$className, 'all']);
        } else {
            $data[static::$collectionName] = call_user_func([static::$namespace . static::$className, 'with'], static::$eagerLoading[0]);
            if (count(static::$eagerLoading) > 1) {
                for ($i = 1; $i < count(static::$eagerLoading); $i++) {
                    $data[static::$collectionName] = $data[static::$collectionName]->with(static::$eagerLoading[$i]);
                }
            }
            $data[static::$collectionName] = $data[static::$collectionName]->get();
        }
        return view('admin.' . static::$folderName . '.' . static::$viewName, $data);
    }
    public function postIndex(Request $request) {
        if ($request->isMethod('post') && $request->is(\App::getLocale() . '/admin/*')) {
            $variable = call_user_func([static::$namespace . static::$className, 'findOrNew'], $request->input('id'));
            $variable->fill($request->all());
            if ($variable->save()) {
                return response()->json(['msg' => 'Se guardó el ' . call_user_func([static::$namespace . static::$className, 'getPrettyName']) . ' correctamente.']);
            } else {
                return response()->json(['errors' => $variable->getErrors()], 400);
            }
        } else {
            return response()->json(['errors' => ['Permission Denied']], 400);
        }
    }

    public function deleteIndex() {
        $variable = call_user_func(array(static::$className, 'find'), Input::get('ID'));
        if ($variable->delete()) {
            return Response::json(array('mensaje' => 'Se borró el ' . call_user_func(array(static::$className, 'getPrettyName')) . ' correctamente'));
        }
        return Response::json(array('errores' => $variable->getErrors()), 400);
    }

    public function getModificar($id = null) {
        $data[static::$varName] = call_user_func([static::$namespace . static::$className, 'findOrNew'], $id);
        return view('admin.' . static::$folderName . '.' . static::$viewName . 'form', $data);
    }

//    public function getIndex() {
//        if (count(static::$eagerLoading) == 0) {
//            $data[$this->getCollectionName()] = $this->executeFunction('orderBy', 'id')->get();
//        } else {
//            $data[$this->getCollectionName()] = $this->executeFunction('with', static::$eagerLoading[0]);
//            if (isset(static::$eagerLoading[1])) {
//                $data[$this->getCollectionName()] = $data[$this->getCollectionName()]->with(static::$eagerLoading[1]);
//            }
//            $data[$this->getCollectionName()] = $data[$this->getCollectionName()]->orderBy('id')->get();
//        }
//        return view($this->getFolder(), $data);
//    }
//
//    public function postIndex() {
//        $var = $this->executeFunction('findOrNew', \Input::get('id'));
//        $var->fill(\Input::all());
//        if ($var->save()) {
//            $this->afterPostIndex($var);
//            return \Redirect::to($this->getFolder(false))
//                            ->with('mensaje', 'Se guardo el ' .
//                                    call_user_func([$var, 'getPrettyName']) .
//                                    ' correctamente.');
//        } else {
//            return \Redirect::back()->withInput()
//                            ->withErrors($var->getErrors());
//        }
//    }
//
//    public function deleteIndex() {
//        $var = $this->executeFunction('find', \Input::get('id'));
//        if ($var->delete()) {
//            if (\Request::ajax()) {
//                return response()->json(array('mensaje' => 'Se borró el ' .
//                            call_user_func(array($var, 'getPrettyName')) . ' correctamente.'));
//            }
//            return \Redirect::to($this->getFolder(false))
//                            ->with('mensaje', 'Se borró el ' .
//                                    call_user_func(array($var, 'getPrettyName')) . ' correctamente.');
//        }
//        if (\Request::ajax()) {
//            return response()->json(array('errores' => $var->getErrors()));
//        }
//        return Redirect::to($this->getFolder(false))->withErrors($var->getErrors());
//    }
//
//    public function getModificar($id = 0) {
//        $data[$this->getVarName()] = $this->executeFunction('findOrNew', $id);
//        return view($this->getFolder() . 'form', $data);
//    }
//
//    public function getFolder($formatFolder = true) {
//        if (is_null($this->folder)) {
//            $folder = str_replace('Controller', '', get_class($this));
//            $aux = "";
//            $arr = explode("\\", $folder);
//            foreach ($arr as $section) {
//                $aux .=lcfirst($section) . '.';
//            }
//            $aux = substr($aux, 0, -1);
//            $this->folder = $aux;
//            $this->folderUrlFormat = camel_case(str_replace('.', '/', $aux));
//        }
//        if ($formatFolder) {
//            return $this->folder;
//        } else {
//            return $this->folderUrlFormat;
//        }
//    }
//
//    public function getVarName() {
//        return lcfirst($this->getModelName());
//    }
//
//    public function getModelName() {
//        if (is_null($this->modelName)) {
//            $className = class_basename(get_class($this));
//            $className = str_replace('Controller', '', $className);
//            $className = str_singular_spanish($className);
//            $this->modelName = ucfirst($className);
//        }
//        return $this->modelName;
//    }
//
//    public function getCollectionName() {
//        if (is_null($this->collectionName)) {
//            $modelName = $this->getModelName();
//            $this->collectionName = lcfirst(str_plural_spanish($modelName));
//        }
//        return $this->collectionName;
//    }
//
//    private function executeFunction($function, $param = null) {
//        $modelName = $this->getModelName();
//        if ($param !== null) {
//            return call_user_func([$modelName, $function], $param);
//        } else {
//            return call_user_func([$modelName, $function]);
//        }
//    }

}
