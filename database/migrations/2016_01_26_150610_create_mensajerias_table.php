<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajeriasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('mensajerias', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('tipo_mensajeria_id', false, true);
            $table->integer('estatus_mensajeria_id', false, true);
            $table->string('asunto', 100);
            $table->longText('contenido');
            $table->bigInteger('tamano_lote');
            $table->bigInteger('tiempo_lote');
            $table->bigInteger('total_enviado');
            $table->string('lista_cliente');
            $table->string('lista_destinatario');
            $table->boolean('ind_nivel')->default(0); /* Discrimina si el msj sera para Administradores y/o Usuarios en general */
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
        Schema::drop('mensajerias');
    }

}
