<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{

    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('descripcion');
            $table->string('imagen');
            $table->string('marca');
            $table->string('existenciaminima');
            $table->string('existenciamaxima');
            $table->integer('mostrarencatalogo');
            $table->string('referencia');
            $table->integer('estado');
            $table->integer('inventario');

            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
