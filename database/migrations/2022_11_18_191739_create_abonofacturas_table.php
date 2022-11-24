<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonofacturasTable extends Migration
{
    public function up()
    {
        Schema::create('abonofacturas', function (Blueprint $table) {
            $table->id();
            $table->string('valor');
            $table->BigInteger('user_id');

            $table->unsignedBigInteger('prefactura_id')->nullable();
            $table->unsignedBigInteger('factura_id')->nullable();
           // $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('cuenta_id')->nullable();
            $table->unsignedBigInteger('cuentascliente_id')->nullable();
            $table->unsignedBigInteger('tipopago_id')->nullable();

            $table->foreign('prefactura_id')->references('id')->on('prefacturas')->onDelete('cascade');
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
            $table->foreign('cuentascliente_id')->references('id')->on('cuentasclientes')->onDelete('cascade');
            $table->foreign('tipopago_id')->references('id')->on('tipopagos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ventarapidas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('identificacion');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('created');

            $table->unsignedBigInteger('factura_id');

            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('utilidades', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad');
            $table->string('precioventa');
            $table->string('utilidadbruta');
            $table->string('utilidadporcentual');
            $table->string('costo_producto');

            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('cargueinventario_id');

            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('cargueinventario_id')->references('id')->on('cargueinventarios')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilidades');
        Schema::dropIfExists('ventarapidas');
        Schema::dropIfExists('abonofacturas');
    }
}
