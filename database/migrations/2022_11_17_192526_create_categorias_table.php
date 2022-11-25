<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{

    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('mostrarencatalogo');
            $table->integer('servicio');
            $table->BigInteger('user_id');

            $table->unsignedBigInteger('empresa_id');
           // $table->unsignedBigInteger('user_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
          //  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        /*
        Schema::create('categoriacompras', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
        */
    }

    public function down()
    {
       // Schema::dropIfExists('categoriacompras');
        Schema::dropIfExists('categorias');
    }
}
