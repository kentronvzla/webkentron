<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosIncidenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos_incidente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aviso_incidente_id', false, true);
            $table->integer('incidente_id', false, true);
            $table->date('fecha');
            $table->longText('mensaje');
            $table->boolean('ind_automatico')->default(1);
            $table->integer('contador_vista')->default(0);
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
        Schema::drop('avisos_incidente');
    }
}
