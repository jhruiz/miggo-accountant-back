<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsgastosTable extends Migration
{

    public function up()
    {
        Schema::create('itemsgastos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->date('fechagasto');
            $table->BigInteger('user_id');

            //$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('empresa_id');

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->date('fechagasto');
            $table->string('valor');
            $table->integer('traslado');
            $table->integer('cuentadestino');
            $table->string('tipoempresa');

            $table->unsignedBigInteger('empresa_id')->nullable();//saber si se deja nulo
            $table->unsignedBigInteger('itemsgasto_id')->nullable();
            $table->unsignedBigInteger('empresaasg_id')->nullable();


            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('itemsgasto_id')->references('id')->on('itemsgastos')->onDelete('cascade');
            $table->foreign('empresaasg_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gastos');
        Schema::dropIfExists('itemsgastos');
    }
}
