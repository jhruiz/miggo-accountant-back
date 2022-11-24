<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosprefacturasTable extends Migration
{

    public function up()
    {
        Schema::create('estadosprefacturas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('prefacturas', function (Blueprint $table) {
            $table->id();
            $table->text('observacion');
            $table->integer('eliminar');
            $table->BigInteger('user_id');

            //$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('ordentrabajo_id')->unsigned()->nullable();
            $table->unsignedBigInteger('estadoprefactura_id');

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('ordentrabajo_id')->references('id')->on('ordentrabajos')->onDelete('cascade');
            $table->foreign('estadoprefactura_id')->references('id')->on('estadosprefacturas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prefacturas');
        Schema::dropIfExists('estadosprefacturas');
    }
}
