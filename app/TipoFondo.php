<?php

namespace App;

use App\BaseModel;


/**
 * App\TipoFondo
 *
 * @property integer $id
 * @property string $descripcion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contenido[] $contenido
 * @property-read mixed $estatus_display
 */
class TipoFondo extends BaseModel {

    //
    protected $table = 'tipo_fondos';
    
    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'descripcion',
    ];
    
     /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'descripcion' => 'required',
    ];
    
    protected function getPrettyFields() {
        return [
               'descripcion' => 'Descripción',             
        ];
    }
    
    public function getPrettyName() {
        return "Tipo Fondos";
    }
    
    public function contenido()
    {
        return $this->hasMany('App\Contenido');
    }
    
    public static function getCampoCombo() {
        return "descripcion";
    }
}