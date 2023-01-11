<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoactivosfijosTable extends Migration
{

    public function up()
    {
        Schema::create('grupoactivosfijos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');
            $table->integer('creador_id')->nullable();

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipoactivosfijos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('creador_id')->nullable();

            // $table->unsignedBigInteger('empresa_id')->nullable();

            // $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('estadoactivos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('creador_id')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('activosfijos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->text('direccion')->nullable();
            $table->boolean('alquilable')->default('0');//activo o desctivado
            $table->string('imagen')->nullable();
            $table->string('nivelcentrocosto')->nullable();
            $table->date('adquisicionfecha')->nullable();
            $table->integer('depreciaraniocompra')->nullable();
            $table->integer('depreciarmesescompra')->nullable();
            $table->string('salvamento')->nullable();
            $table->integer('depreciaranio')->nullable();
            $table->integer('depreciarmeses')->nullable();
            $table->double('residuo')->nullable();
            $table->text('observaciones')->nullable();
            $table->double('costohora')->nullable();
            $table->integer('creador_id')->nullable();

            $table->unsignedBigInteger('ciudade_id')->nullable();
            $table->unsignedBigInteger('tipoactivosfijo_id')->nullable();
            $table->unsignedBigInteger('puc_id')->nullable();
            $table->unsignedBigInteger('estadoactivo_id')->nullable();
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->unsignedBigInteger('centrocosto_id')->nullable();
            $table->unsignedBigInteger('gruposactivosfijo_id')->nullable();

            $table->foreign('ciudade_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('tipoactivosfijo_id')->references('id')->on('tipoactivosfijos')->onDelete('cascade');
            $table->foreign('puc_id')->references('id')->on('pucs')->onDelete('cascade');
            $table->foreign('estadoactivo_id')->references('id')->on('estadoactivos')->onDelete('cascade');
            $table->foreign('responsable_id')->references('id')->on('terceros')->onDelete('cascade');
            $table->foreign('centrocosto_id')->references('id')->on('centrocostos')->onDelete('cascade');
            $table->foreign('gruposactivosfijo_id')->references('id')->on('grupoactivosfijos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activosfijos');
        Schema::dropIfExists('estadoactivos');
        Schema::dropIfExists('tipoactivosfijos');
        Schema::dropIfExists('grupoactivosfijos');
    }
}
