<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contenidos', function(Blueprint $table)
                {
                    $table->increments('id')->unique();
                    $table->integer('tipo_publicaciones_id', false, true)->unsigned();
                    $table->integer('tipo_fondos_id', false, true)->unsigned();
                    $table->integer('modo_vistas_id', false, true)->unsigned();
                    $table->string('titulo',256);
                    $table->string('resumen',256);
                    $table->string('detalle',256);
                    $table->string('fondo',256)->nullable();
                    $table->string('url',256)->nullable();
                    $table->tinyInteger('ind_activo')->nullable();
                    $table->string('autor',256);
                    $table->string('referencia_externa',256)->nullable();                    
                    $table->date('fecha_vigencia')->nullable();
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
        //
        Schema::drop('contenidos');
    }
}