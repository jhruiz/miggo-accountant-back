<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiiuseccionesTable extends Migration
{

    public function up()
    {
        Schema::create('ciiusecciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ciiudivisiones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');

            $table->unsignedBigInteger('ciiuseccione_id')->nullable();

            $table->foreign('ciiuseccione_id')->references('id')->on('ciiusecciones')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ciiugrupos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');

            $table->unsignedBigInteger('ciiudivisione_id')->nullable();

            $table->foreign('ciiudivisione_id')->references('id')->on('ciiudivisiones')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ciiuclases', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');

            $table->unsignedBigInteger('ciiugrupo_id')->nullable();

            $table->foreign('ciiugrupo_id')->references('id')->on('ciiugrupos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ciiuclases');
        Schema::dropIfExists('ciiugrupos');
        Schema::dropIfExists('ciiudivisiones');
        Schema::dropIfExists('ciiusecciones');
    }
}
