<?php

namespace App;

use App\BaseModel;
use Carbon\Carbon;


/**
 * App\Contenido
 *
 * @property integer $id
 * @property integer $tipo_publicaciones_id
 * @property integer $tipo_fondos_id
 * @property integer $modo_vistas_id
 * @property string $titulo
 * @property string $resumen
 * @property string $detalle
 * @property string $fondo
 * @property string $url
 * @property string $referencia_externa
 * @property \Carbon\Carbon $fecha_vigencia
 * @property integer $usuario_creacion_id
 * @property integer $usuario_modificacion_id
 * @property integer $version
 * @property boolean $ind_visible
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\TipoPublicacion $tipoPublicaciones
 * @property-read \App\TipoFondo $tipoFondos
 * @property-read \App\ModoVista $modoVistas
 * @property-read mixed $estatus_display
 */
class Contenido extends BaseModel {

    protected $primaryKey = "id";
    protected $table = 'contenidos';
    protected $dates = ['fecha_vigencia'];
    public static $extensionesImagenes = ['jpg', 'png', 'gif', 'bmp', 'tiff', 'wmp', 'jp2'];

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'tipo_publicaciones_id',
        'tipo_fondos_id',
        'modo_vistas_id',
        'titulo',
        'resumen',
        'detalle',
        'fondo',
        'url',
        'referencia_externa',
        'fecha_vigencia',
        'ind_visible',
        'usuario_creacion_id',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'tipo_publicaciones_id' => 'required|integer',
        'modo_vistas_id' => 'required|integer',
        'tipo_fondos_id' => 'required|integer',
        'usuario_creacion_id' => 'required|integer',
        'titulo' => 'required',
        'resumen' => 'required',
        'detalle' => 'required',
        'fondo' => '',
        'url' => 'required',
        'referencia_externa' => '',
        'fecha_vigencia' => 'required|date',
        'ind_visible' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'tipo_publicaciones_id' => 'Tipo de Publicación',
            'tipo_fondos_id' => 'Tipo de Fondo',
            'modo_vistas_id' => 'Modo de Vista',
            'titulo' => 'Título',
            'resumen' => 'Resumen',
            'detalle' => 'Detalle',
            'fondo' => 'Fondo',
            'url' => 'Url',
            'ind_visible' => '¿Activo?',
            'usuario_creacion_id' => 'Autor',
            'referencia_externa' => 'Referencia Externa',
            'fecha_vigencia' => 'Fecha de Vigencia',
        ];
    }

    public function getPrettyName() {
        return "Contenido";
    }

    /**
     * Define una relación pertenece a TipoPublicacion
     * @return TipoPublicacion
     */
    public function tipoPublicaciones() {
        return $this->belongsTo('App\TipoPublicacion', 'tipo_publicaciones_id');
    }

    /**
     * Define una relación pertenece a TipoFondo
     * @return TipoFondo
     */
    public function tipoFondos() {
        return $this->belongsTo('App\TipoFondo', 'tipo_fondos_id');
    }

    /**
     * Define una relación pertenece a ModoVista
     * @return ModoVista
     */
    public function modoVistas() {
        return $this->belongsTo('App\ModoVista', 'modo_vistas_id');
    }
    
    /**
     * Define una relación pertenece a User
     * @return User
     */
    public function usuarioAsignacion() {
        return $this->belongsTo('App\User', 'usuario_creacion_id');
    }
    
    /**
     * Define una relación pertenece a User
     * @return User
     */
    public function usuarioModificacion() {
        return $this->belongsTo('App\User', 'usuario_modificacion_id');
    }
 
    
    /**
     * Define una relación pertenece a ModoVista
     * @return ModoVista
     */
    public function getTableFields() {
        return [
            'tipoPublicaciones->descripcion', 'titulo', 'ind_visible', 'fecha_vigencia'
        ];
    }

    public function setFechaVigenciaAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_vigencia'] = Carbon::createFromFormat('d/m/Y', $value)->format('d-m-Y');
        }
    }

    public static function crear(array $values) {
        $contenido = new Contenido();
        $contenido->fill($values);
        $contenido->validate();
        return $contenido;
    }

}
