<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoactivosTable extends Migration
{

    public function up()
    {
        Schema::create('grupoactivos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipoactivos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('estadoactivos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('activosfijos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->text('direccion');
            $table->boolean('alquilable')->default('0');//activo o desctivado
            $table->string('imagen');
            $table->string('nivelcentrocosto');
            $table->date('fechacompra');
            $table->integer('depreciaraniocompra');
            $table->integer('depreciarmesescompra');
            $table->string('salvamento');
            $table->integer('depreciaranio');
            $table->integer('depreciarmeses');
            $table->double('residuo');
            $table->text('observaciones');
            $table->double('costohora');

            $table->unsignedBigInteger('ciudade_id')->nullable();
            $table->unsignedBigInteger('tipoactivo_id')->nullable();
            $table->unsignedBigInteger('puc_id')->nullable();
            $table->unsignedBigInteger('estadoactivo_id')->nullable();
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->unsignedBigInteger('centrocosto_id')->nullable();

            $table->foreign('ciudade_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('tipoactivo_id')->references('id')->on('tipoactivos')->onDelete('cascade');
            $table->foreign('puc_id')->references('id')->on('pucs')->onDelete('cascade');
            $table->foreign('estadoactivo_id')->references('id')->on('estadoactivos')->onDelete('cascade');
            $table->foreign('responsable_id')->references('id')->on('terceros')->onDelete('cascade');
            $table->foreign('centrocosto_id')->references('id')->on('centrocostos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activosfijos');
        Schema::dropIfExists('estadoactivos');
        Schema::dropIfExists('tipoactivos');
        Schema::dropIfExists('grupoactivos');
    }
}
