<?php

namespace App;

use App\BaseModel;


/**
 * App\ModoVista
 *
 * @property integer $id
 * @property string $descripcion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contenido[] $contenido
 * @property-read mixed $estatus_display
 * @property integer $usuario_creacion_id
 * @property integer $usuario_modificacion_id
 * @property integer $version
 * @property boolean $ind_visible
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereUsuarioCreacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereUsuarioModificacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereIndVisible($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModoVista whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ModoVista extends BaseModel {

    //
    protected $table = 'modo_vistas';
    
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
        return "Modo Vistas";
    }
    
    public function contenido()
    {
        return $this->hasMany('App\Contenido');
    }
    
    public static function getCampoCombo() {
        return "descripcion";
    }
}
