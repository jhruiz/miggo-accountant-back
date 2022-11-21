<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicidadmovilesTable extends Migration
{

    public function up()
    {
        Schema::create('publicidadmoviles', function (Blueprint $table) {
            $table->id();
            $table->string('url_img');
            $table->integer('mostrar');
            $table->integer('ubicacion');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('empresa_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('semaforos', function (Blueprint $table) {
            $table->id();
            $table->integer('rango_inicial');
            $table->integer('rango_final');
            $table->string('color');

            $table->softDeletes();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('semaforos');
        Schema::dropIfExists('publicidadmoviles');
    }
}
