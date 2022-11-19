<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdentrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordentrabajos', function (Blueprint $table) {
            $table->id();
            $table->string('kilometraje');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->integer('herramientas');
            $table->integer('llaves');
            $table->integer('documentos');
            $table->text('observaciones_usuario');
            $table->text('observaciones_cliente');
            $table->string('codigo');

            $table->unsignedBigInteger('ordenestado_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('plantaservicio_id');

            $table->foreign('ordenestado_id')->references('id')->on('ordentrabajos')->onDelete('cascade');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('plantaservicio_id')->references('id')->on('plantaservicios')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('ordentrabajos');
    }
}
