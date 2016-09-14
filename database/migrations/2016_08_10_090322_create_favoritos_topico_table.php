<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritosTopicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos_topico', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('topico_id', false, true);
            $table->integer('sistema_id', false, true);
            $table->integer('usuario_creacion_id', false, true);
            $table->integer('usuario_modificacion_id', false, true);
            $table->integer('version')->default(0);
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
        Schema::drop('favoritos_topico');
    }
}
