<?php

namespace App;

use App\BaseModel;
use Carbon\Carbon;

class Grupo extends BaseModel {

    protected $connection = 'mysql';
    protected $table = 'groups';
    protected $primaryKey = "id";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    
    protected $rules = [
        'name' => 'required|max:100'
    ];
    
    public static $permissions = [
        'Super' => [
            'Descripcion' => 'Super Usuario',
            'superuser' => 'Puede acceder a cualquier sección',
        ],
        'AdministrarController' => [
            'Descripcion' => 'Menu de Administración',
            'GET.admin' => 'Configuración de tablas',
        ],
        'UsuariosController' => [
            'Descripcion' => 'Usuarios',
            'GET.admin.user' => 'Crear',
            'POST.admin.user' => 'Actualizar',
            'DELETE.admin.user' => 'Eliminar',
            'GET.admin.user.modify' => 'Modificar',
        ],
        'GruposController' => [
            'Descripcion' => 'Grupos',
            'GET.admin.grupo' => 'Crear',
            'POST.admin.grupo' => 'Actualizar',
            'DELETE.admin.grupo' => 'Eliminar',
            'GET.admin.grupo.modify' => 'Modificar',
        ],
    ];

    /**
     * Array clave valor que le asocia a un atributo del modelo una oración o una frase que describe al atributo.
     * Se usa para construir los mensajes de error.
     * @return array
     */
    protected function getPrettyFields() {
        return [
            'name' => 'Grupo'
        ];
    }

    /**
     * Oración o palabra mas descriptiva del nombre de la tabla que maneja el modelo
     * 
     * @return string
     */
    public function getPrettyName() {
        return "Grupos de usuario";
    }

    public function getTableFields() {
        return ['name'];
    }

    public static function getCampoCombo() {
        return "name";
    }

    public static function getPrimaryKey() {
        return "id";
    }

    /**
     * The users that belong to the group.
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }

}
