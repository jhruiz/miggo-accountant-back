<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCierrecajasTable extends Migration
{

    public function up()
    {
        Schema::create('cierrecajas', function (Blueprint $table) {
            $table->id();
            $table->integer('saldo_inicial');
            $table->integer('ventas');
            $table->integer('gastos');
            $table->integer('traslados_ing');
            $table->integer('traslados_gas');
            $table->integer('abonos');
            $table->BigInteger('user_id');

            //$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('caja_id')->nullable();
            $table->unsignedBigInteger('empresa_id');

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('caja_id')->references('id')->on('cuentas')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('observacionescierres', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('observacionescierres');
        Schema::dropIfExists('cierrecajas');
    }
}
