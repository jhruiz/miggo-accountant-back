<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{

    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('cilindraje');
            $table->string('modelo');
            $table->string('color');
            $table->string('num_motor');
            $table->string('num_chasis');
            $table->string('linea');
            $table->date('soat');
            $table->date('tecno');
            
            $table->unsignedBigInteger('tipovehiculo_id')->unsigned()->nullable();;
            $table->unsignedBigInteger('marcavehiculo_id')->unsigned()->nullable();;
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos')->onDelete('cascade');
            $table->foreign('marcavehiculo_id')->references('id')->on('marcavehiculos')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
