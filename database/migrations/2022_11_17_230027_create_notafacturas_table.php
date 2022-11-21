<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotafacturasTable extends Migration
{

    public function up()
    {
        Schema::create('notafacturas', function (Blueprint $table) {
            $table->id();
            $table->text('description');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('factura_notafactura_user', function (Blueprint $table) { //facturas_notafacturas
            $table->id();

            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('notafactura_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('notafactura_id')->references('id')->on('notafacturas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('factura_cuenta_valores', function (Blueprint $table) {
            $table->id();
            $table->string('valor');

            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('cuenta_id');
            $table->unsignedBigInteger('prefactura_id');
            $table->unsignedBigInteger('tipopago_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
            $table->foreign('prefactura_id')->references('id')->on('prefacturas')->onDelete('cascade');
            $table->foreign('tipopago_id')->references('id')->on('tipopagos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cuentasclientes', function (Blueprint $table) {
            $table->id();
            $table->date('fechapago');
            $table->string('totalobligacion');
            $table->string('total');
            $table->integer('eliminar');

            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('deposito_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('prefactura_id');

            $table->foreign('documento_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('deposito_id')->references('id')->on('cuentas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('prefacturas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('tipopagos')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('factura_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prefactura_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {

        Schema::dropIfExists('cuentasclientes');
        Schema::dropIfExists('factura_cuenta_valores');
        Schema::dropIfExists('factura_notafactura_user');
        Schema::dropIfExists('notafacturas');
    }
}
