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
class TipoArchivo extends BaseModel {

    //
    protected $primaryKey = "id";
    protected $table = 'tipo_archivos';

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre',
        'extension',
        'tamaño_maximo'
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
        'extension' => 'required',
        'tamaño_maximo' => 'required|integer'

    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'extension' => 'Extensión',
            'tamaño_maximo' => 'Tamaño Máximo'
        ];
    }


    public function getPrettyName() {
        return "Tipo Archivo";
    }

    public function archivoTopico() {
        return $this->hasMany('App\ArchivoTopico');
    }

    /*public function archivosTopico() {
        return $this->hasMany('App\ArchivoTopico');
    }*/

    public static function crear(array $values) {
        $tipoarchivo = new TipoArchivo();
        $tipoarchivo->fill($values);
        $tipoarchivo->validate();
        $tipoarchivo->setUserFieldsAttributes($tipoarchivo);
        return $tipoarchivo;
    }

    
}
