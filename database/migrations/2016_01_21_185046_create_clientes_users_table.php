<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clientes_users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('cliente_id', false, true);
            $table->integer('user_id', false, true);
            $table->bigInteger('ci')->nullable();
            $table->string('cargo', 100)->nullable();
            $table->string('departamento', 100)->nullable();
            $table->string('num_telefono', 25);
            $table->string('num_extension', 25)->nullable();
            $table->string('num_telefono_celular', 25)->nullable();
            $table->string('social', 255)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->boolean('ind_notificacion')->default(1);
            $table->boolean('ind_mensajeria')->default(1);
            $table->boolean('ind_nivel')->default(0);
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
        Schema::drop('clientes_users');
    }

}
