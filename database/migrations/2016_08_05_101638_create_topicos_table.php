<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topicos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('titulo', 200);
            $table->string('imagen', 200);
            $table->integer('categoria_id', false, true);
            $table->integer('sistema_id', false, true);
            $table->boolean('ind_privado')->default(1);
            $table->string('descripcion', 200);
            $table->string('acciones', 200);
            $table->string('tags', 200);
            $table->integer('views');
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
        Schema::drop('topicos');
    }
}
