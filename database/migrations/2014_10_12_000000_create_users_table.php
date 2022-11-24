<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {

        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('identificacion')->unique();
            $table->text('direccion');
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->unique();
            $table->date('cumpleanios');

            $table->unsignedBigInteger('ciudade_id')->nullable();
          
            $table->foreign('ciudade_id')->references('id')->on('ciudades')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('imagen')->nullable();
            $table->string('password');
            $table->integer('estadologin')->nullable();
            $table->integer('intentos')->nullable();
            $table->integer('preselect')->nullable();
            $table->date('validaciongestion')->nullable();
            $table->string('email')->unique();
            $table->boolean('estatus')->default('1');//activo o desctivado
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();

            $table->unsignedBigInteger('persona_id')->nullable();
            $table->unsignedBigInteger('perfile_id')->nullable();
           // $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();//TODO no debe ir nulo registrar empresa 1

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('perfile_id')->references('id')->on('perfiles')->onDelete('cascade');
           // $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes(); //note no add in table pivot
            $table->timestamps();
        });
    

    Schema::create('proveedores', function (Blueprint $table) {
        $table->id();
        $table->string('nit');
        $table->string('nombre');
        $table->string('telefono');
        $table->string('paginaweb');
        $table->string('email')->unique();
        $table->integer('diascredito');
        $table->string('limitecredito');
        $table->text('observaciones');
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->BigInteger('user_id');

        //$table->unsignedBigInteger('user_id');//creador
       // $table->unsignedBigInteger('estado_id');
        $table->unsignedBigInteger('empresa_id');
        $table->unsignedBigInteger('regimene_id')->nullable();
        $table->unsignedBigInteger('persona_id')->nullable();

        //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //$table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        $table->foreign('regimene_id')->references('id')->on('regimenes')->onDelete('cascade');
        $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });

    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('nit');
        $table->string('nombre');
        $table->string('paginaweb');
        $table->integer('diascredito');
        $table->string('limitecredito');
        $table->text('observaciones');
        $table->integer('estadisticas');
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->BigInteger('user_id');


       // $table->unsignedBigInteger('user_id');
        //$table->unsignedBigInteger('estado_id')->unsigned()->nullable();
        $table->unsignedBigInteger('empresa_id');
        $table->unsignedBigInteger('clasificacioncliente_id')->nullable();
        $table->unsignedBigInteger('persona_id')->nullable();

       // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       // $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        $table->foreign('clasificacioncliente_id')->references('id')->on('clasificacionclientes')->onDelete('cascade');
        $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });

    }
    
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('users');
        Schema::dropIfExists('personas');

    }
}


