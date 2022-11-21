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

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('itemsgasto_id');
            $table->unsignedBigInteger('empresaasg_id');


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
