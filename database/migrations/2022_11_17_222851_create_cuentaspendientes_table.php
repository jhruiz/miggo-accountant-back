<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaspendientesTable extends Migration
{

    public function up()
    {
        Schema::create('cuentaspendientes', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('costoproducto');
            $table->integer('numerofactura');
            $table->date('fechapago');
            $table->string('totalobligacion');
            $table->string('total');
            $table->string('eliminar');

            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('deposito_id');
            $table->unsignedBigInteger('proveedore_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('deposito_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('proveedore_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuentaspendientes');
    }
}
