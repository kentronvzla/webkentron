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
 */
class ArchivoTopico extends BaseModel {

    //
    protected $primaryKey = "id";
    protected $table = 'archivo_topicos';

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre',
        'sistema_id',
        'tipo_archivo_id',
        'topico_id',
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
        'nombre' => 'required',
        'sistema_id' => 'required',
        'tipo_archivo_id' => 'required',
        'topico_id' => 'required',

    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'sistema_id' => 'Sistema',
            'tipo_archivo_id' => 'Tipo de Archivo',
            'topico_id' => 'Tópico',
        ];
    }


    public function getPrettyName() {
        return "Archivo Topico";
    }

    public function TipoArchivo() {
        return $this->belongsTo('App\TipoArchivo', 'tipo_archivo_id');
    }
    public function Sistema() {
        return $this->belongsTo('App\Sistema', 'sistema_id');
    }
    public function Topico() {
        return $this->belongsTo('App\Topico', 'topico_id');
    }


    /*public function archivosTopico() {
        return $this->hasMany('App\ArchivoTopico');
    }*/

    public static function crear(array $values) {
        $archivotopico = new ArchivoTopico();
        $archivotopico->fill($values);
        $archivotopico->validate();
        $archivotopico->setUserFieldsAttributes($archivotopico);
        return $archivotopico;
    }

    
}
