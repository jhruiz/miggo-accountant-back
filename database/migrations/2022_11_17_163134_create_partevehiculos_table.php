<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartevehiculosTable extends Migration
{

    public function up()
    {
        Schema::create('partevehiculos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('extra');
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('partevehiculo_tipovehiculo', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedBigInteger('partevehiculo_id');
            $table->unsignedBigInteger('tipovehiculo_id');

            $table->foreign('partevehiculo_id')->references('id')->on('partevehiculos')->onDelete('cascade');
            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ordentrabajo_partevehiculo_estadoparte', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('ordentrabajo_id');
            $table->unsignedBigInteger('partevehiculo_id');
            $table->unsignedBigInteger('estadoparte_id');

            $table->foreign('ordentrabajo_id')->references('id')->on('ordentrabajos')->onDelete('cascade');
            $table->foreign('partevehiculo_id')->references('id')->on('partevehiculos')->onDelete('cascade');
            $table->foreign('estadoparte_id')->references('id')->on('estadopartes')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('ordentrabajo_partevehiculo_estadoparte');
        Schema::dropIfExists('partevehiculo_tipovehiculo');
        Schema::dropIfExists('partevehiculos');
    }
}
