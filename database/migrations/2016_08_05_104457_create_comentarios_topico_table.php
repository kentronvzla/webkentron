<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTopicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios_topico', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('comentario', 200);
            $table->integer('topicos_id', false, true);
            $table->integer('ranking');
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
        Schema::drop('comentarios_topico');
    }
}
