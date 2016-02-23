<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('contenidos', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('tipo_publicaciones_id', false, true);
            $table->integer('tipo_fondos_id', false, true);
            $table->integer('modo_vistas_id', false, true);
            $table->string('titulo', 255);
            $table->longText('resumen');
            $table->longText('detalle');
            $table->string('fondo', 255)->nullable();
            $table->longText('url')->unique();
            $table->longText('referencia_externa')->nullable();
            $table->date('fecha_vigencia');
            $table->integer('usuario_creacion_id', false, true);
            $table->integer('usuario_modificacion_id', false, true);
            $table->integer('version')->default(0);
            $table->boolean('ind_visible')->default(1);
            $table->timestamps();

            // We'll need to ensure that MySQL uses the InnoDB engine to
            // support the indexes, other engines aren't affected.
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('contenidos');
    }

}
