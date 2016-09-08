<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosIncidenteTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('documentos_incidente', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('incidente_id', false, true);
            $table->text('archivo');
            $table->string('nombre');
            $table->string('tipo', 10)->nullable();
            $table->longText('comentario')->nullable();
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
        Schema::drop('documentos_incidente');
    }

}
