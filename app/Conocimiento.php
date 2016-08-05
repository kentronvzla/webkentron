<?php

namespace App;

use App\BaseModel;
use Carbon\Carbon;
use Illuminate\Support\Str as Str;

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
class Conocimiento extends BaseModel {

    protected $primaryKey = "id";
    protected $table = 'conocimientos';

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre',
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
        'nombre' => 'required',
        'descripcion' => 'required',
        
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
        ];
    }

    public function getPrettyName() {
        return "conocimiento";
    }

    /**
     * Define una relación pertenece a TipoPublicacion
     * @return TipoPublicacion
     */
    public function tipoPublicaciones() {
        return $this->belongsTo('App\TipoPublicacion', 'tipo_publicaciones_id');
    }

    public static function crear(array $values) {
        $contenido = new Contenido();
        $contenido->fill($values);
        $contenido->validate();
        $contenido->setGlobalNewAttributes($contenido, User::getUserIdLogged());
        $contenido->setFieldsAttributes($contenido);
        return $contenido;
    }

}
