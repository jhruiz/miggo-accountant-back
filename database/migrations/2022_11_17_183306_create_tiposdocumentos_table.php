<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposdocumentosTable extends Migration
{

    public function up()
    {
        Schema::create('tiposdocumentos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');


            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');

            $table->unsignedBigInteger('tiposdocumento_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('tiposdocumento_id')->references('id')->on('tiposdocumentos')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('tiposdocumentos');
    }
}
