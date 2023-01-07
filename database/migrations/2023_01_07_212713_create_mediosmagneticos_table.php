<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediosmagneticosTable extends Migration
{

    public function up()
    {
        Schema::create('mediosmagneticos', function (Blueprint $table) {
            $table->id();
            $table->date('diainicial');
            $table->date('diafinal');
            $table->double('mostrarcuentaterceros');
            $table->double('PorcentajeDiario');

            // $table->unsignedBigInteger('dianformato_id');TODO: falta saber que lleva la tabla dian formatos
            $table->unsignedBigInteger('user_id');

            // $table->foreign('dianformato_id')->references('id')->on('dianformatos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mediosmagneticos');
    }
}
