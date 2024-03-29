<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdentrabajosTable extends Migration
{

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
            $table->text('observaciones_user');
            $table->text('observaciones_cliente');
            $table->string('codigo');
            $table->BigInteger('user_id');


            $table->unsignedBigInteger('ordenestado_id')->nullable();
            $table->unsignedBigInteger('vehiculo_id')->nullable();
            //$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('plantaservicio_id')->nullable();

            $table->foreign('ordenestado_id')->references('id')->on('ordentrabajos')->onDelete('cascade');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('plantaservicio_id')->references('id')->on('plantaservicios')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordentrabajos');
    }
}
