<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePerfilesTable extends Migration
{
    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipoidentificaciones', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tipoidentificaciones');
        Schema::dropIfExists('perfiles');
    }
}
