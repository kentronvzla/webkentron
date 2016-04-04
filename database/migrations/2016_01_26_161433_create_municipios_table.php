<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('estado_id', false, true);
            $table->string('nombre', 200);
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
        Schema::drop('municipios');
    }

}
