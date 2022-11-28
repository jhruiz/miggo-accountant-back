<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrefacturasdetallesTable extends Migration
{

    public function up()
    {
        Schema::create('prefacturasdetalles', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('costoventa');
            $table->string('descuento');
            $table->double('porcentaje');
            $table->integer('impuesto');

            $table->unsignedBigInteger('cargueinventario_id');
            $table->unsignedBigInteger('prefactura_id');

            $table->foreign('cargueinventario_id')->references('id')->on('cargueinventarios')->onDelete('cascade');
            $table->foreign('prefactura_id')->references('id')->on('prefacturas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prefacturasdetalles');
    }
}
