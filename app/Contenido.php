<?php

namespace App;

use App\BaseModel;


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
 * @property boolean $ind_activo
 * @property string $autor
 * @property string $referencia_externa
 * @property string $fecha_vigencia
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\TipoPublicacion $tipoPublicacion
 * @property-read \App\TipoFondo $tipoFondo
 * @property-read \App\ModoVista $modoVista
 * @property-read mixed $estatus_display
 */
class Contenido extends BaseModel {

    protected $primaryKey = "id";
    protected $table = 'contenidos';
    protected $dates = ['fecha_vigencia'];
    
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
        'ind_activo',
        'autor',
        'referencia_externa',
        'fecha_vigencia',
    ];
    
     /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [        
        'tipo_publicaciones_id'=>'required',
        'modo_vistas_id'=>'required',
        'tipo_fondos_id'=>'required',
        'titulo'=>'',
        'resumen'=>'',
        'detalle'=>'',
        'fondo'=>'',
        'url'=>'',
        'ind_activo'=>'',
        'autor'=>'',
        'referencia_externa'=>'',
        'fecha_vigencia'=>'',
    ];
    
    protected function getPrettyFields() {
        return [
            'tipo_publicaciones_id'=>'Tipo de Publicación',
            'tipo_fondos_id'=>'Tipo de Fondo',
            'modo_vistas_id'=>'Modo de Vista',
            'titulo'=>'Título',
            'resumen'=>'Resumen',
            'detalle'=>'Detalle',
            'fondo'=>'Fondo',
            'url'=>'Url',
            'ind_activo'=>'¿Activo?',
            'autor'=>'Autor',
            'referencia_externa'=>'Referencia Externa',
            'fecha_vigencia'=>'Fecha de Vigencia',
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
        return $this->belongsTo('App\TipoPublicacion','tipo_publicaciones_id');
    }
    
     /**
     * Define una relación pertenece a TipoFondo
     * @return TipoFondo
     */
    public function tipoFondos() {
        return $this->belongsTo('App\TipoFondo' , 'tipo_fondos_id');
    }
    
     /**
     * Define una relación pertenece a ModoVista
     * @return ModoVista
     */
    public function modoVistas() {
        return $this->belongsTo('App\ModoVista', 'modo_vistas_id');
    }
    
//    public function isBooleanField($key){
//        if($key=="activated"){
//            return true;
//        }
//    }
    
    public function getTableFields() {
        return [
            'tipoPublicacion->descripcion', 'titulo', 'ind_activo', 'fecha_vigencia'
        ];
    }
}