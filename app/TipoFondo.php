<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFondo extends BaseModel implements SimpleTableInterface, DecimalInterface, DefaultValuesInterface {

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
        return $this->belongsTo('App\Contenido');
    }
}