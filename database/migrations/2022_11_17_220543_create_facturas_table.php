<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{

    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->date('fechavence');
            $table->string('pagocontado');
            $table->string('pagocredito');
            $table->string('consecutivodian');
            $table->integer('relacionempresa');
            $table->integer('factura');
            $table->text('observacion');
            $table->date('fechapagoservicio');
            $table->integer('eliminar');

            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tipopago_id');
            $table->unsignedBigInteger('documento_id')->nullable();
            $table->unsignedBigInteger('ordentrabajo_id')->unsigned()->nullable();
            $table->unsignedBigInteger('cuenta_id')->nullable();
            $table->unsignedBigInteger('estadopagomecanico_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('tipopago_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('documento_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('ordentrabajo_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('cuenta_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('estadopagomecanico_id')->references('id')->on('cargueinventarios')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('facturasdetalles', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('costoventa');
            $table->string('costototal');
            $table->integer('descuento');
            $table->double('porcentaje');
            $table->string('impuesto');

            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('deposito_id');
            $table->unsignedBigInteger('producto_id');

            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('deposito_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('facturasdetalles');
        Schema::dropIfExists('facturas');
    }
}
