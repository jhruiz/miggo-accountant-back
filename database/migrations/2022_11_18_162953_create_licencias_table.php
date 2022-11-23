<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{

    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidaddias');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('licencia_empresa', function (Blueprint $table) {
            $table->id();
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->string('codigo');
            $table->string('cantidad');

            $table->unsignedBigInteger('licencia_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('estado_id');

            $table->foreign('licencia_id')->references('id')->on('licencias')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estadoalertas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
/*
        Schema::create('licencias_users', function (Blueprint $table) {
            $table->id();
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->string('codigo');

            $table->unsignedBigInteger('licencia_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estado_id');

            $table->foreign('licencia_id')->references('id')->on('licencias')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });   */
    }

 

    public function down()
    {
        //Schema::dropIfExists('licencias_users');
        Schema::dropIfExists('licencia_empresa');
        Schema::dropIfExists('licencias');
    }
}
