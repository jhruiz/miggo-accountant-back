<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisesTable extends Migration
{

    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {//TODO AGREGAR DEPARTAMENTO
            $table->id();
            $table->text('descripcion');

            $table->timestamps();
        });

        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->unsignedBigInteger('paise_id');

            $table->foreign('paise_id')->references('id')->on('paises')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ciudades');
        Schema::dropIfExists('paises');
    }
}
