<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
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
class Sistema extends BaseModel {

    //
    protected $primaryKey = "id";
    protected $table = 'sistemas';

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre',
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
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
        ];
    }

    public function getPrettyName() {
        return "Sistema";
    }

    public function topicos() {
        return $this->hasMany('App\Topico');
    }
    public function archivoTopico() {
        return $this->hasMany('App\ArchivoTopico');
    }

    public static function crear(array $values) {
        $sistema = new Sistema();
        $sistema->fill($values);
        $sistema->validate();
        $sistema->setUserFieldsAttributes($sistema);
        return $sistema;
    }

    
}
