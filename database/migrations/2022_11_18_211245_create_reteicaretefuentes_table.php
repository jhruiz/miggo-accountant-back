<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReteicaretefuentesTable extends Migration
{

    public function up()
    {
        Schema::create('reteicaretefuentes', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->double('porcentajes');
            $table->integer('reteica');
            $table->integer('retefuente');

            $table->unsignedBigInteger('empresa_id');
            
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('numerofactura');
            $table->double('prciva');
            $table->double('vlriva');
            $table->double('prcreteica');
            $table->double('vlrreteica');
            $table->double('prcretefuente');
            $table->double('vlrretefuente');

            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('proveedore_id');
            $table->unsignedBigInteger('reteica_id');
            $table->unsignedBigInteger('retefuente_id');
            
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('proveedore_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('reteica_id')->references('id')->on('reteicaretefuentes')->onDelete('cascade');
            $table->foreign('retefuente_id')->references('id')->on('reteicaretefuentes')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
        Schema::dropIfExists('reteicaretefuentes');
    }
}
