<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('parroquia_id', false, true)->nullable();
            $table->integer('estatus_cliente_id', false, true);
            $table->string('codigo', 10);
            $table->string('logo', 255)->nullable();
            $table->string('rif', 25);
            $table->string('nombre', 255);
            $table->string('direccion', 255)->nullable();
            $table->string('coordenada', 255)->nullable();
            $table->string('contacto', 255)->nullable();
            $table->string('num_telefono', 25);
            $table->string('num_telefono_otro', 25)->nullable();
            $table->string('pagina_web', 255)->nullable();
            $table->string('social', 255)->nullable();
            $table->integer('prioridad')->default(1);
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
        Schema::drop('clientes');
    }

}
