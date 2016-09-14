<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoTopicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_topicos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nombre', 200);
            $table->integer('topicos_id', false, true);
            $table->integer('sistema_id', false, true);
            $table->integer('tipo_archivo_id', false, true);
            $table->integer('usuario_creacion_id', false, true);
            $table->integer('usuario_modificacion_id', false, true);
            $table->integer('version')->default(0);
            $table->boolean('ind_visible')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('archivos_topico');
    }
}
