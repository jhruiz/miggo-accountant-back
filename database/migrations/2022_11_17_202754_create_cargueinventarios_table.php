<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargueinventariosTable extends Migration
{

    public function up()
    {
        Schema::create('cargueinventarios', function (Blueprint $table) {
            $table->id();
            $table->string('costoproducto');
            $table->integer('existenciaactual');
            $table->string('preciomaximo');
            $table->string('preciominimo');
            $table->string('precioventa');
            $table->string('numerofactura');
            $table->string('impuesto');
            $table->string('valor_impuesto');

            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('deposito_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('proveedore_id');
            $table->unsignedBigInteger('tipopago_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('deposito_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('proveedore_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('tipopago_id')->references('id')->on('tipopagos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cargueinventario_impuesto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cargueinventario_id');
            $table->unsignedBigInteger('impuesto_id');

            $table->foreign('cargueinventario_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('impuesto_id')->references('id')->on('impuestos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cargueinventario_impuesto');
        Schema::dropIfExists('cargueinventarios');
    }
}
