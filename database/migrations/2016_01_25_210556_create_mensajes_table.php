<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('asunto', 100);
            $table->longText('contenido');
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->integer('frecuencia')->nullable();
            $table->string('interface', 100); /**/
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
        Schema::drop('mensajes');
    }

}
