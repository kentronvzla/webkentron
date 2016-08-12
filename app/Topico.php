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
class Topico extends BaseModel {

    protected $primaryKey = "id";
    protected $table = 'topicos';

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'categoria_id',
        'titulo',
        'descripcion',
        'acciones',
        'tags',
        'ind_visible',
        
    ];

    protected $guarded = ['id', 'url', 'usuario_creacion_id', 'usuario_modificacion_id'];
   

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        
    ];

    protected function getPrettyFields() {
        return [
            'categoria_id' => "Categoría",
            'titulo' => "Título",
            'descripcion' => "Descripción",
            'acciones' => "Acciones",
            'tags' => "Tags",
            'ind_visible' => "¿Activo?"
        ];
    }

    public function getPrettyName() {
        return "Tópicos";
    }

    /**
     * Define una relación pertenece a TipoPublicacion
     * @return TipoPublicacion
     */
    public function Categoria() {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }
    public function Sistema() {
        return $this->belongsTo('App\Sistema', 'sistema_id');
    }

}
