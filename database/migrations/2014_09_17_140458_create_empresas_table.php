<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{

    public function up()
    {
        
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('razonsocial')->nullable();
            $table->string('nit');
            $table->text('direccion');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('email')->unique();
            $table->string('representantelegal');
            $table->string('imagen');
            $table->integer('logo');
            $table->string('texto1');
            $table->string('texto2');
            $table->string('texto3');
            $table->string('texto4');
            $table->integer('vercuentasdb');
            
            $table->unsignedBigInteger('ciudade_id')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('ciudade_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('relacionempresas', function (Blueprint $table) {//TODO: esta tabla no es necesaria debe integrase
            $table->id();
            $table->string('nombre');
            $table->string('nit');
            $table->text('direccion');
            $table->string('telefono1');
            $table->string('email')->unique();
            $table->string('representantelegal');
            $table->string('imagen');
            $table->string('codigo');
            
            $table->unsignedBigInteger('empresa_id')->nullable();
            
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('relacionempresas');
        Schema::dropIfExists('empresas');
    }
}
