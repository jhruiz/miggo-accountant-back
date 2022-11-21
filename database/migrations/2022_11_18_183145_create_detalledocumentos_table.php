<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalledocumentosTable extends Migration
{

    public function up()
    {
        Schema::create('detalledocumentos', function (Blueprint $table) {
            $table->id();
            $table->string('costoproducto');
            $table->integer('cantidad');
            $table->string('preciomaximo');
            $table->string('preciominimo');
            $table->string('precioventa');
            $table->string('numerofactura');

            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('depositoorigen_id');
            $table->unsignedBigInteger('depositodestino_id');
            $table->unsignedBigInteger('proveedore_id');
            $table->unsignedBigInteger('tipopago_id');
            $table->unsignedBigInteger('documento_id');

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('depositoorigen_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('depositodestino_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('proveedore_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('tipopago_id')->references('id')->on('tipopagos')->onDelete('cascade');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('trasladoinventarios', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidadtraslado');

            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('depositoorigen_id');
            $table->unsignedBigInteger('depositodestino_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('depositoorigen_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('depositodestino_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('descargueinventarios', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidaddescargue');

            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('depositoorigen_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('depositoorigen_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('descargueinventarios');
        Schema::dropIfExists('trasladoinventarios');
        Schema::dropIfExists('detalledocumentos');
    }
}
