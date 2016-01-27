<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model {

    //
    protected $table = 'contenidos';
    
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
            'ind_activo'=>'Indicador de Activo',
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
    public function tipoPublicacion() {
        return $this->hasOne('App\TipoPublicacion');
    }
    
     /**
     * Define una relación pertenece a TipoFondo
     * @return TipoFondo
     */
    public function tipoFondo() {
        return $this->hasOne('App\TipoFondo');
    }
    
     /**
     * Define una relación pertenece a ModoVista
     * @return ModoVista
     */
    public function modoVista() {
        return $this->hasOne('App\ModoVista');
    }
}