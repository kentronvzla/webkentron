<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use ReflectionClass;

class TableBaseController extends Controller {

    protected $namespace;
    protected $collectionName;
    protected $modelName;
    protected $folder;
    protected $folderUrlFormat;
    protected static $eagerLoading = [];

    public function __construct() {
        $this->namespace = "App\\";
        $this->collectionName = null;
        $this->modelName = null;
        $this->folder = null;
        $this->folderUrlFormat = null;
    }

    public function getIndex() {
        if (count(static::$eagerLoading) == 0) {
            $data[$this->getCollectionName()] = $this->executeFunction('orderBy', 'id')->get();
        } else {
            $data[$this->getCollectionName()] = $this->executeFunction('with', static::$eagerLoading[0]);
            if (isset(static::$eagerLoading[1])) {
                $data[$this->getCollectionName()] = $data[$this->getCollectionName()]->with(static::$eagerLoading[1]);
            }
            $data[$this->getCollectionName()] = $data[$this->getCollectionName()]->orderBy('id')->get();
        }

        return view($this->getFolder(), $data);
    }

    public function postIndex(Request $request) {
        $model = $this->executeFunction('findOrNew', $request->input('id'));
        $model->fill($request->all());
        if ($model->save()) {
            $this->afterPostIndex($model);
            return redirect($this->getFolder(false))
                            ->with('mensaje', 'Se guardo el ' .
                                    call_user_func([$model, 'getPrettyName']) .
                                    ' correctamente.');
        } else {
            return back()->withInput()->withErrors($model->getErrors());
        }
    }

    public function deleteIndex(Request $request) {
        $model = $this->executeFunction('findOrFail', $request->input('id'));
        if ($model->delete()) {
            if ($request->ajax()) {
                return response()->json(['mensaje' => 'Se borró el ' .
                           call_user_func([$model, 'getPrettyName']) . ' correctamente.']);
            }
            return redirect($this->getFolder(false, true))
                            ->with('mensaje', 'Se borró el ' .
                                    call_user_func([$model, 'getPrettyName']) . ' correctamente.');
        }
        if ($request->ajax()) {
            return response()->json(['errores' => $model->getErrors()]);
        }
        return redirect($this->getFolder(false, true))->withErrors($model->getErrors());
    }

    public function getModificar(Request $request, $id = 0) {
        $data[$this->getVarName()] = $this->executeFunction('findOrNew', $id);
        return view($this->getFolder() . 'form', $data);
    }

    public function getFolder($formatFolder = true, $delete = false) {
        if (is_null($this->folder)) {
            $reflect = new ReflectionClass(get_class($this));
            $folder = str_replace("App\\Http\\Controllers\\", '', $reflect->getName());
            $folder = str_replace('Controller', '', $folder);
            $view = str_replace('Controller', '', $reflect->getShortName());
            $aux = "";
            $folder_array = explode("\\", $folder);
            foreach ($folder_array as $i => $section) {
                $aux .=lcfirst($section) . '.';
                if ($i == count($folder_array) - 1) {
                    if(!$delete)
                        $aux .= lcfirst($view);
                }
            }
            $this->folder = $aux;
            $this->folderUrlFormat = camel_case(str_replace('.', '/', $aux));
        }
        if ($formatFolder) {
            return $this->folder;
        } else {
            return $this->folderUrlFormat;
        }
    }

    public function getVarName() {
        return lcfirst($this->getModelName());
    }

    public function getModelName() {
        if (is_null($this->modelName)) {
            $className = class_basename(get_class($this));
            $className = str_replace('Controller', '', $className);
            $className = Helper::strSingularSpanish($className);
            $this->modelName = ucfirst($className);
        }
        return $this->modelName;
    }

    public function getCollectionName() {
        if (is_null($this->collectionName)) {
            $modelName = $this->getModelName();
            $this->collectionName = lcfirst(Helper::strPluralSpanish($modelName));
        }
        return $this->collectionName;
    }

    private function executeFunction($function, $param = null) {
        $modelName = $this->getModelName();
        $namespaceName = $this->namespace;
        if ($param !== null) {
            return call_user_func([$namespaceName . $modelName, $function], $param);
        } else {
            return call_user_func([$namespaceName . $modelName, $function]);
        }
    }

}
