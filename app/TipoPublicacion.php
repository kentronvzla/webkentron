<?php

namespace App;

use App\BaseModel;

/**
 * App\TipoPublicacion
 *
 * @property integer $id
 * @property string $descripcion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contenido[] $contenido
 * @property-read mixed $estatus_display
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contenido[] $contenidos
 * @property string $pagina
 * @property integer $orden
 * @property integer $max_width_img
 * @property integer $max_heigth_img
 * @property integer $usuario_creacion_id
 * @property integer $usuario_modificacion_id
 * @property integer $version
 * @property boolean $ind_visible
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion wherePagina($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereOrden($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereMaxWidthImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereMaxHeigthImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereUsuarioCreacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereUsuarioModificacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereIndVisible($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TipoPublicacion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TipoPublicacion extends BaseModel {

    //
    protected $table = 'tipo_publicaciones';

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
        return "Tipo Publicaciones";
    }

    public function contenidos() {
        return $this->hasMany('App\Contenido', 'tipo_publicaciones_id');
    }
    
    public static function getCampoCombo() {
        return "descripcion";
    }
}
