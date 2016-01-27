<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosIncidenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documentos_incidente', function (Blueprint $table) {
            $table->increments('id');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos_incidente', function (Blueprint $table) {
            Schema::drop('DOCUMENTO_CANDIDATO');
        });
    }
}
