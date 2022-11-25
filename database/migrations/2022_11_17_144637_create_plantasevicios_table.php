<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantaseviciosTable extends Migration
{

    public function up()
    {
        Schema::create('plantaservicios', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plantaservicios');
    }
}
