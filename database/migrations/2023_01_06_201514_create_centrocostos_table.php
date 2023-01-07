<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrocostosTable extends Migration
{

    public function up()
    {
        Schema::create('centrocostos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('divisiones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');

            $table->unsignedBigInteger('centrocosto_id');
            $table->unsignedBigInteger('puc_id');

            $table->foreign('centrocosto_id')->references('id')->on('centrocostos')->onDelete('cascade');
            $table->foreign('puc_id')->references('id')->on('pucs')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');

            $table->unsignedBigInteger('divisione_id');

            $table->foreign('divisione_id')->references('id')->on('divisiones')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dependencias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');

            $table->unsignedBigInteger('dependencia_id');

            $table->foreign('dependencia_id')->references('id')->on('dependencias')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dependencias');
        Schema::dropIfExists('secciones');
        Schema::dropIfExists('divisiones');
        Schema::dropIfExists('centrocostos');
    }
}
