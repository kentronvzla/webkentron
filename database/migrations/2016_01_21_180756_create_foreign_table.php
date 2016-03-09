<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('contenidos', function(Blueprint $table) {
            $table->index('tipo_publicaciones_id');
            $table->foreign('tipo_publicaciones_id')->references('id')->on('tipo_publicaciones');

//            $table->index('tipo_fondos_id');
//            $table->foreign('tipo_fondos_id')->references('id')->on('tipo_fondos');

            $table->index('modo_vistas_id');
            $table->foreign('modo_vistas_id')->references('id')->on('modo_vistas');

            $table->index('usuario_creacion_id');
            $table->foreign('usuario_creacion_id')->references('id')->on('users');

            $table->index('usuario_modificacion_id');
            $table->foreign('usuario_modificacion_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::table('contenidos', function(Blueprint $table) {
            $table->dropForeign('contenidos_tipo_publicaciones_id_foreign');
            $table->dropIndex('contenidos_tipo_publicaciones_id_index');

//            $table->dropForeign('contenidos_tipo_fondos_id_foreign');
//            $table->dropIndex('contenidos_tipo_fondos_id_index');

            $table->dropForeign('contenidos_modo_vistas_id_foreign');
            $table->dropIndex('contenidos_modo_vistas_id_index');

            $table->dropForeign('contenidos_usuario_creacion_id_foreign');
            $table->dropIndex('contenidos_usuario_creacion_id_index');

            $table->dropForeign('contenidos_usuario_creacion_id_foreign');
            $table->dropIndex('contenidos_usuario_creacion_id_index');
        });
    }

}
