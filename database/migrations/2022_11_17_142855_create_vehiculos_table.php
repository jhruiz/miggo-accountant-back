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
            $table->string('placa')->nullable();
            $table->string('cilindraje')->nullable();
            $table->string('modelo')->nullable();
            $table->string('color')->nullable();
            $table->string('num_motor')->nullable();
            $table->string('num_chasis')->nullable();
            $table->string('linea')->nullable();
            $table->date('soat')->nullable();
            $table->date('tecno')->nullable();
            
            $table->unsignedBigInteger('tipovehiculo_id')->nullable();
            $table->unsignedBigInteger('marcavehiculo_id')->nullable();
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos')->onDelete('cascade');
            $table->foreign('marcavehiculo_id')->references('id')->on('marcavehiculos')->onDelete('cascade');
            $table->foreign('referencia_id')->references('id')->on('referencias')->onDelete('cascade');
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
