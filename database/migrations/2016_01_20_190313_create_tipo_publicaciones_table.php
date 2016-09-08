<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPublicacionesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('tipo_publicaciones', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('descripcion', 255);
            $table->string('pagina', 255);
            $table->integer('orden', false, true);
            $table->integer('max_width_img', false, true);
            $table->integer('max_heigth_img', false, true);
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
        Schema::drop('tipo_publicaciones');
    }

}
