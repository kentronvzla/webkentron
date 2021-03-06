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
 * @property-read \App\User $usuarioCreacion
 * @property-read \App\User $usuarioModificacion
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereTipoPublicacionesId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereTipoFondosId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereModoVistasId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereTitulo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereResumen($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereDetalle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereFondo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereReferenciaExterna($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereFechaVigencia($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereUsuarioCreacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereUsuarioModificacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereIndVisible($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contenido whereUpdatedAt($value)
 * @mixin \Eloquent
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
        'modo_vistas_id',
        'titulo',
        'resumen',
        'detalle',
        'fondo',
        'tags',
        'fecha_vigencia',
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
        'tipo_publicaciones_id' => 'required|integer',
        'modo_vistas_id' => 'required|integer',
        'titulo' => 'required',
        'resumen' => 'required',
        'detalle' => 'required',
        'fondo' => 'string',
        'tags' => 'string',
        'fecha_vigencia' => 'required|date|after:today',
        'ind_visible' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'tipo_publicaciones_id' => 'Tipo de Publicación',
            'modo_vistas_id' => 'Modo de Vista',
            'titulo' => 'Título',
            'resumen' => 'Resumen',
            'detalle' => 'Detalle',
            'fondo' => 'Fondo',
            'url' => 'Url',
            'ind_visible' => '¿Activo?',
            'usuario_creacion_id' => 'Autor',
            'tags' => 'Etiquetas',
            'fecha_vigencia' => 'Fecha de Vigencia',
            'tipo_publicacion' => 'Tipo Publicación'
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
//    public function tipoFondos() {
//        return $this->belongsTo('App\TipoFondo', 'tipo_fondos_id');
//    }

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
    public function usuarioCreacion() {
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
            'tipo_publicacion', 'titulo', 'ind_visible', 'fecha_vigencia'
        ];
    }
    
    public function getTipoPublicacionAttribute() {
        return $this->tipoPublicaciones->descripcion;
    }

    public function setFechaVigenciaAttribute($value) {
        if ($value != "") {
            $value = date("Y-m-d", strtotime(str_replace('/', '-', $value)));
            $this->attributes['fecha_vigencia'] = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
        }
    }

    public function setFieldsAttributes($contenido) {
        $tipo_publicacion = Str::slug($contenido->tipoPublicaciones->descripcion);
        $titulo = Str::slug($contenido->attributes['titulo']);
        $codigo_fecha = Carbon::createFromFormat('d-m-Y H:i:s', date('d-m-Y H:i:s'))->format('dmY-His');
        $contenido->attributes['url'] = Str::slug($codigo_fecha . " " . $tipo_publicacion . " " . $titulo);
    }

    public static function crear(array $values) {
        $contenido = new Contenido();
        $contenido->fill($values);
        $contenido->validate();
        $contenido->setGlobalNewAttributes($contenido, Usuario::getUserIdLogged());
        $contenido->setFieldsAttributes($contenido);
        return $contenido;
    }

}
