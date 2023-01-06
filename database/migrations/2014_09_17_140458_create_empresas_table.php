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
            $table->string('imagen')->nullable();
            $table->integer('logo')->nullable();
            $table->string('texto1')->nullable();
            $table->string('texto2')->nullable();
            $table->string('texto3')->nullable();
            $table->string('texto4')->nullable();
            $table->string('moneda')->default('$')->nullable();
            $table->boolean('resolucionautoretenedor')->default('0');//activo o desctivado
            $table->date('fechaResolucion')->nullable();
            $table->boolean('ica')->default('0');//activo o desctivado
            $table->boolean('renta')->default('0');//activo o desctivado
            $table->boolean('aut')->default('0');//activo o desctivado
            $table->enum('nivelgasto',['0','1', '2', '3'])->default('0');
            $table->boolean('ecommerce')->default('0');//activo o desctivado
            $table->integer('puc_id')->nullable();
            $table->string('msgpuc')->default('Esta opción tiene una configuracion estandar con la lista para ser utilizada cualquier cambio afectará directamente su contabilidad y sera bajo su responsabilidad');

            $table->unsignedBigInteger('ciudade_id')->nullable();
            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->unsignedBigInteger('ciiuclase_id')->nullable();
            $table->unsignedBigInteger('tipocontribuyente_id')->nullable();
            $table->unsignedBigInteger('tiposociedade_id')->nullable();

            $table->foreign('ciudade_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('sucursal_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('ciiuclase_id')->references('id')->on('ciiuclases')->onDelete('cascade');
            $table->foreign('tipocontribuyente_id')->references('id')->on('tipocontribuyentes')->onDelete('cascade');
            $table->foreign('tiposociedade_id')->references('id')->on('tiposociedades')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('regimene_empresa', function (Blueprint $table) {
            $table->id();
    
            $table->unsignedBigInteger('regimene_id');
            $table->unsignedBigInteger('empresa_id');
    
            $table->foreign('regimene_id')->references('id')->on('regimenes')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
    
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ica', function (Blueprint $table) {
            $table->id();
            $table->text('actividad');
            $table->text('tarifa');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('ica');
        Schema::dropIfExists('regimene_empresa');
        Schema::dropIfExists('empresas');
    }
}
