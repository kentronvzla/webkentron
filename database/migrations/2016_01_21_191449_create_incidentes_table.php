<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->increments('id');
            /* Foreing Keys */
            $table->integer('actividad_id', false, true);
            $table->integer('producto_id', false, true);
            $table->integer('modulo_id', false, true);
            $table->integer('tipo_incidente_id', false, true);
            $table->integer('estatus_incidente_id', false, true);
            $table->integer('causa_problema_id', false, true);
            $table->integer('cliente_usuario_id', false, true);
            $table->integer('usuario_responsable_id', false, true);
            $table->integer('orden_trabajo_id', false, true);            
            $table->integer('proyecto_id', false, true);
            $table->integer('usuario_atencion_id', false, true);
            $table->integer('estatus_registro_id', false, true);
            $table->integer('usuario_asignado_id', false, true);
            $table->bigInteger('llamada_id', false, true);
            $table->integer('usuario_respuesta_id', false, true);
            $table->integer('adr_id', false, true);
            $table->integer('usuario_verificacion_id', false, true);
            $table->integer('estatus_encuesta_id', false, true);
            /* Foreing Keys */
            
            /* Normal Fields */
            $table->date('fecha_incidente');
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->integer('prioridad')->default(1);
            $table->string('descripcion', 255)->nullable();
            $table->longText('detalle');
            $table->longText('respuesta')->nullable();
            $table->longText('observacion')->nullable();
            $table->longText('accion')->nullable();
            $table->date('fecha_atencion')->nullable();
            $table->string('version_objeto', 15)->nullable();
            $table->date('fecha_aviso_cliente')->nullable();
            $table->string('referencia', 100)->nullable();
            $table->date('fecha_respuesta')->nullable();
            $table->date('fecha_verificacion')->nullable();
            $table->date('fecha_cierre_atencion')->nullable();
            $table->date('fecha_inclusion_adr')->nullable();
            $table->string('nombre_encuestado', 100)->nullable(); /* */
            $table->date('fecha_encuesta')->nullable(); /* */
            $table->boolean('ind_resuelto')->default(0);
            $table->integer('calificacion_tiempo');
            $table->integer('calificacion_solucion');
            $table->integer('calificacion_atencion');
            $table->string('num_requerimiento', 10);
            /* Normal Fields */
            
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
    public function down() {
        Schema::drop('incidentes');
    }

}
