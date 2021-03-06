<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\BaseModel;
use Validator;
use Hash;
use Sentry;

/**
 * App\Usuario
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $permissions
 * @property boolean $activated
 * @property string $activation_code
 * @property string $activated_at
 * @property string $last_login
 * @property string $persist_code
 * @property string $reset_password_code
 * @property string $first_name
 * @property string $last_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $activatedfor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Grupo[] $grupos
 * @property-read mixed $grupos_display
 * @property-read mixed $grupo_name
 * @property-read mixed $grupo_id
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario wherePermissions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereActivated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereActivationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereActivatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereLastLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario wherePersistCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereResetPasswordCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Usuario extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    protected $connection = 'mysql';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = "id";
    protected $manejaConcurrencia = false;
    public $autoPurgeRedundantAttributes = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'first_name', 'last_name', 'activated', 'password', 'password_confirmation', 'id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'password_confirmation'];
    protected $passwordAttributes = ['password'];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required_without:id|min:8|confirmed',
        'password_confirmation' => 'required_with:password|min:8',
        'first_name' => 'required|alpha|max:100',
        'last_name' => 'required|alpha|max:100',
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->manejaConcurrencia = false;
    }

    /**
     * Array clave valor que le asocia a un atributo del modelo una oración o una frase que describe al atributo.
     * Se usa para construir los mensajes de error.
     * @return array
     */
    protected function getPrettyFields() {
        return [
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirmación de Contraseña',
            'first_name' => 'Nombre',
            'last_name' => 'Apellido',
            'activated' => '¿Activo?',
            'activatedfor' => '¿Activo?',
            'grupos' => 'Grupos del usuario',
            'grupos_display' => 'Grupos'
        ];
    }

    /**
     * Oración o palabra mas descriptiva del nombre de la tabla que maneja el modelo
     * 
     * @return string
     */
    public function getPrettyName() {
        return "Usuarios";
    }

    public static function validar($input) {

        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'first_name' => 'required|alpha|max:100',
            'last_name' => 'required|alpha|max:100',
        ];

        return Validator::make($input, $rules);
    }

    /**
     * Boot function for using with User Events
     *
     * @return void
     */
    protected static function boot() {

        static::saving(function ($model) {
            foreach ($model->attributes as $key => $value) {
                // Remove any confirmation fields
                if (ends_with($key, '_confirmation')) {
                    array_forget($model->attributes, $key);
                    continue;
                }
                // Check if this one of our password attributes and if it's been changed.
                if (in_array($key, $model->passwordAttributes) && $value != $model->getOriginal($key)) {
                    $model->attributes[$key] = Hash::make($value);
                    continue;
                }
            }
        });
    }

    public function getActivatedforAttribute() {
        return static::$cmbsino[$this->activated];
    }

    public function grupos() {
        return $this->belongsToMany('App\Grupo', 'users_groups', 'user_id', 'group_id');
    }

    public function getGruposDisplayAttribute() {
        return implode(", ", $this->grupos->lists('name')->toArray());
    }

    public static function puedeAcceder($permiso) {
        return Sentry::getUser()->hasAccess($permiso);
    }

    public function getGrupoNameAttribute() {
        $grupos = $this->grupos;
        if (count($grupos) == 0) {
            return "";
        }
        return $grupos[0]->name;
    }

    public function getGrupoIdAttribute() {
        $grupos = $this->grupos;
        if (count($grupos) == 0) {
            return "";
        }
        return $grupos[0]->id;
    }

    public function isBooleanField($key) {
        if ($key == "activated") {
            return true;
        }
    }

    public function getTableFields() {
        return ['first_name', 'last_name', 'email', 'grupos_display', 'activatedfor'];
    }

    public function isCurrent() {
        if (!Sentry::check()){
            return false;
        }
        return Sentry::getUser()->id == $this->id;
    }

    public static function getLogged() {
        if (!Sentry::check()){
            return false;
        }
        return self::find(Sentry::getUser()->id);
    }

    public static function getUserIdLogged() {
        if (!Sentry::check()){
            return false;
        }
        return Sentry::getUser()->id;
    }

}
