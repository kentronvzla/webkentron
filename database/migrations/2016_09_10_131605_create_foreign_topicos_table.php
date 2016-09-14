<?php
//Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTopicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias', function(Blueprint $table) {
            //$table->index('usuario_creacion_id');
            $table->foreign('usuario_creacion_id')->references('id')->on('users');

            //$table->index('usuario_modificacion_id');
            $table->foreign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('tipo_archivos', function(Blueprint $table) {
            //$table->index('usuario_creacion_id');
            $table->foreign('usuario_creacion_id')->references('id')->on('users');

            //$table->index('usuario_modificacion_id');
            $table->foreign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('topicos', function(Blueprint $table) {
            //$table->index('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');

            //$table->index('sistema_id');
            $table->foreign('sistema_id')->references('id')->on('sistemas');

            //$table->index('usuario_creacion_id');
            $table->foreign('usuario_creacion_id')->references('id')->on('users');

            //$table->index('usuario_modificacion_id');
            $table->foreign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('archivo_topicos', function(Blueprint $table) {
           // $table->index('topicos_id');
            $table->foreign('topicos_id')->references('id')->on('topicos');

            //$table->index('sistema_id');
            $table->foreign('sistema_id')->references('id')->on('sistemas');

            //$table->index('usuario_creacion_id');
            $table->foreign('usuario_creacion_id')->references('id')->on('users');

           // $table->index('usuario_modificacion_id');
            $table->foreign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('favoritos_topico', function(Blueprint $table) {
            //$table->index('favoritos_id');

            //$table->index('sistema_id');
            $table->foreign('sistema_id')->references('id')->on('sistemas');

            //$table->index('usuario_creacion_id');
            $table->foreign('usuario_creacion_id')->references('id')->on('users');

            //$table->index('usuario_modificacion_id');
            $table->foreign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('comentarios_topico', function(Blueprint $table) {
            //$table->index('comentarios_id');
            
            //$table->index('topicos_id');
            $table->foreign('topicos_id')->references('id')->on('topicos');

            //$table->index('usuario_creacion_id');
            $table->foreign('usuario_creacion_id')->references('id')->on('users');

            //$table->index('usuario_modificacion_id');
            $table->foreign('usuario_modificacion_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function(Blueprint $table) {
            //$table->dropIndex('usuario_creacion_id');
            $table->dropForeign('usuario_creacion_id')->references('id')->on('users');

            //$table->dropIndex('usuario_modificacion_id');
            $table->dropForeign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('tipo_archivos', function(Blueprint $table) {
           // $table->dropIndex('usuario_creacion_id');
            $table->dropForeign('usuario_creacion_id')->references('id')->on('users');

            //$table->dropIndex('usuario_modificacion_id');
            $table->dropForeign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('topicos', function(Blueprint $table) {
            //$table->dropIndex('categoria_id');
            $table->dropForeign('categoria_id')->references('id')->on('categorias');

            //$table->dropIndex('sistema_id');
            $table->dropForeign('sistema_id')->references('id')->on('sistemas');

            //$table->dropIndex('usuario_creacion_id');
            $table->dropForeign('usuario_creacion_id')->references('id')->on('users');

            //$table->dropIndex('usuario_modificacion_id');
            $table->dropForeign('usuario_modificacion_id')->references('id')->on('users');
        });

        Schema::table('archivo_topicos', function(Blueprint $table) {
            //$table->dropIndex('topicos_id');
            $table->dropForeign('topicos_id')->references('id')->on('topicos');

            //$table->dropIndex('sistema_id');
            $table->dropForeign('sistema_id')->references('id')->on('sistemas');

            //$table->dropIndex('usuario_creacion_id');
            $table->dropForeign('usuario_creacion_id')->references('id')->on('users');

            //$table->dropIndex('usuario_modificacion_id');
            $table->dropForeign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('favoritos_topico', function(Blueprint $table) {
            //$table->dropIndex('favoritos_id');
            

            //$table->dropIndex('sistema_id');
            $table->dropForeign('sistema_id')->references('id')->on('sistemas');

            //$table->dropIndex('usuario_creacion_id');
            $table->dropForeign('usuario_creacion_id')->references('id')->on('users');

            //$table->dropIndex('usuario_modificacion_id');
            $table->dropForeign('usuario_modificacion_id')->references('id')->on('users');
        });
        Schema::table('comentarios_topico', function(Blueprint $table) {
            //$table->dropIndex('comentarios_id');
           

            //$table->dropIndex('topicos_id');
            $table->dropForeign('topicos_id')->references('id')->on('topicos');

            //$table->dropIndex('usuario_creacion_id');
            $table->dropForeign('usuario_creacion_id')->references('id')->on('users');

            //$table->dropIndex('usuario_modificacion_id');
            $table->dropForeign('usuario_modificacion_id')->references('id')->on('users');
        });
    }
}
