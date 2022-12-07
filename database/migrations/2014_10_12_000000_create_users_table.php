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
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nit');
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
            $table->string('username')->unique()->nullable();
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
        $table->string('nombre')->nullable();
        $table->string('telefono')->nullable();
        $table->string('paginaweb')->nullable();
        $table->string('email')->unique();
        $table->integer('diascredito')->nullable();
        $table->string('limitecredito')->nullable();
        $table->text('observaciones')->nullable();
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->BigInteger('user_id')->nullable();

        //$table->unsignedBigInteger('user_id');//creador
       // $table->unsignedBigInteger('estado_id');
        $table->unsignedBigInteger('empresa_id')->nullable();
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

    Schema::create('regimene_proveedore', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('regimene_id')->nullable();
        $table->unsignedBigInteger('proveedore_id')->nullable();

        $table->foreign('regimene_id')->references('id')->on('regimenes')->onDelete('cascade');
        $table->foreign('proveedore_id')->references('id')->on('proveedores')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });


    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('nit')->nullable();
        $table->string('nombre')->nullable();
        $table->string('paginaweb')->nullable();
        $table->integer('diascredito')->nullable();
        $table->string('limitecredito')->nullable();
        $table->text('observaciones')->nullable();
        $table->integer('estadisticas')->nullable();
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->BigInteger('user_id')->nullable();


       // $table->unsignedBigInteger('user_id');
        //$table->unsignedBigInteger('estado_id')->unsigned()->nullable();
        $table->unsignedBigInteger('empresa_id')->nullable();
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

    Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->double('sueldo')->nullable();
        $table->text('observaciones')->nullable();
        $table->integer('estadisticas')->nullable();
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->BigInteger('user_id')->nullable();


       // $table->unsignedBigInteger('user_id');
        //$table->unsignedBigInteger('estado_id')->unsigned()->nullable();
        $table->unsignedBigInteger('empresa_id')->nullable();
       // $table->unsignedBigInteger('clasificacioncliente_id')->nullable();
        $table->unsignedBigInteger('persona_id')->nullable();

       // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       // $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        //$table->foreign('clasificacioncliente_id')->references('id')->on('clasificacionclientes')->onDelete('cascade');
        $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });

    }
    
    public function down()
    {
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('regimene_proveedore');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('users');
        Schema::dropIfExists('personas');

    }
}


