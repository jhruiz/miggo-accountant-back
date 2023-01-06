<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {

        Schema::create('terceros', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nit')->nullable()->unique();
            $table->string('identificacion')->nullable()->unique();
            $table->text('direccion')->nullable();
            $table->text('direccion2')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->unique();
            $table->date('cumpleanios')->nullable();
            $table->string('idiomaComunicacion')->nullable();
            $table->string('sector')->nullable();
            $table->text('actividad')->nullable();
            $table->text('siguienteactividad')->nullable();
            $table->text('tarjetaprofesional')->nullable();
            $table->text('pronombre')->nullable();
            $table->text('msgemail')->nullable();

            $table->unsignedBigInteger('ciudade_id')->nullable();
            $table->unsignedBigInteger('tipodireccione_id')->nullable();
            $table->unsignedBigInteger('tipodireccione2_id')->nullable();
            $table->unsignedBigInteger('tipoidentificacione_id')->nullable();
            $table->unsignedBigInteger('clasificacioncontacto_id')->nullable();
            $table->unsignedBigInteger('terminospago_id')->nullable();
          
            $table->foreign('ciudade_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('tipodireccione_id')->references('id')->on('tipodirecciones')->onDelete('cascade');
            $table->foreign('tipodireccione2_id')->references('id')->on('tipodirecciones')->onDelete('cascade');
            $table->foreign('tipoidentificacione_id')->references('id')->on('tipoidentificaciones')->onDelete('cascade');
            $table->foreign('clasificacioncontacto_id')->references('id')->on('clasificacioncontactos')->onDelete('cascade');
            $table->foreign('terminospago_id')->references('id')->on('terminospagos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bancos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('telefono')->nullable();
            $table->string('numeroSucursal')->nullable();
            $table->text('direccion')->nullable();
    
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tercero_banco', function (Blueprint $table) {
            $table->id();
            $table->string('numero_cuenta')->nullable();
            $table->string('tipo_cuenta')->nullable();

            $table->unsignedBigInteger('tercero_id')->nullable();
            $table->unsignedBigInteger('banco_id')->nullable();
    
            $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade');
            $table->foreign('banco_id')->references('id')->on('bancos')->onDelete('cascade');
    
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
            $table->date('validaciongestion')->nullable();
            $table->string('email')->unique();
            $table->boolean('estatus')->default('1');//activo o desctivado
            $table->string('msgEstatus')->default('Su usuario a sido deshabilitado contacte con el responsable de su empresa');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();

            $table->unsignedBigInteger('tercero_id')->nullable();
            $table->unsignedBigInteger('perfile_id')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();//TODO no debe ir nulo registrar empresa 1

            $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade');
            $table->foreign('perfile_id')->references('id')->on('perfiles')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes(); //note no add in table pivot
            $table->timestamps();
        });


    Schema::create('proveedores', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->nullable();
        $table->string('telefono')->nullable();
        $table->string('paginaweb')->nullable();
        $table->string('email')->nullable();
        $table->integer('diascredito')->nullable();
        $table->string('limitecredito')->nullable();
        $table->text('observaciones')->nullable();
        $table->boolean('estatus')->default('1');//activo o desctivado

        $table->unsignedBigInteger('user_id');//creador
        $table->unsignedBigInteger('empresa_id')->nullable();
        $table->unsignedBigInteger('tercero_id')->nullable();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });

    Schema::create('regimene_proveedore', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('regimene_id');
        $table->unsignedBigInteger('proveedore_id');

        $table->foreign('regimene_id')->references('id')->on('regimenes')->onDelete('cascade');
        $table->foreign('proveedore_id')->references('id')->on('proveedores')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });


    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('paginaweb')->nullable();
        $table->integer('diascredito')->nullable();
        $table->string('limitecredito')->nullable();
        $table->text('observaciones')->nullable();
        $table->integer('estadisticas')->nullable();
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->string('msgEstatus')->default('Este Cliente no se le facturar mas, debe habilitarlo en caso contrario');
        $table->text('mesajeEstatus')->nullable();
        $table->text('clientedescuento')->nullable();

        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('empresa_id')->nullable();
        $table->unsignedBigInteger('clasificacioncliente_id')->nullable();
        $table->unsignedBigInteger('tercero_id')->nullable();
        $table->unsignedBigInteger('clientedescuento_id')->nullable();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        $table->foreign('clasificacioncliente_id')->references('id')->on('clasificacionclientes')->onDelete('cascade');
        $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade');
        $table->foreign('clientedescuento_id')->references('id')->on('clientedescuentos')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });

    Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->double('sueldo')->nullable();
        $table->text('observaciones')->nullable();
        $table->integer('estadisticas')->nullable();
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->string('msgEstatus')->default('Este Empleado No esta Activo en la Empresa, debe habilitarlo en caso contrario');
        $table->date('inicio')->nullable();
        $table->string('puestoTrabajo')->nullable();

        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('empresa_id')->nullable();
        $table->unsignedBigInteger('tercero_id')->nullable();
        $table->unsignedBigInteger('responsable_id')->nullable();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade');
        $table->foreign('responsable_id')->references('id')->on('terceros')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });

    Schema::create('socios', function (Blueprint $table) {
        $table->id();
        $table->double('sueldo')->nullable();
        $table->text('observaciones')->nullable();
        $table->integer('estadisticas')->nullable();
        $table->boolean('estatus')->default('1');//activo o desctivado
        $table->date('inicio')->nullable();
        $table->string('puestoTrabajo')->nullable();

        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('empresa_id')->nullable();
        $table->unsignedBigInteger('tercero_id')->nullable();
        $table->unsignedBigInteger('tipodesocio_id')->nullable();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade');
        $table->foreign('tipodesocio_id')->references('id')->on('tiposocios')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });


    Schema::create('regimene_socio', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('regimene_id');
        $table->unsignedBigInteger('socio_id');

        $table->foreign('regimene_id')->references('id')->on('regimenes')->onDelete('cascade');
        $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');

        $table->softDeletes();
        $table->timestamps();
    });

    }
    
    public function down()
    {
        Schema::dropIfExists('regimene_socio');
        Schema::dropIfExists('socios');
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('regimene_proveedore');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('users');
        Schema::dropIfExists('tercero_banco');
        Schema::dropIfExists('bancos');
        Schema::dropIfExists('terceros');
    }
}


