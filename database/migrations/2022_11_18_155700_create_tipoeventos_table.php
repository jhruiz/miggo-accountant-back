<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoeventosTable extends Migration
{

    public function up()
    {
        Schema::create('tipoeventos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('preselect');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('estadoalertas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('inicial');
            $table->integer('final');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

            Schema::create('eventos', function (Blueprint $table) {
                $table->id();
                $table->date('fecha');
                $table->text('descripcion');
                $table->string('cliente');
                $table->string('telefono');
                $table->string('placa');
                $table->BigInteger('user_id');

                //$table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('empresa_id');
                $table->unsignedBigInteger('estadoalerta_id')->nullable();
                $table->unsignedBigInteger('tipoevento_id')->nullable();

                //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
                $table->foreign('estadoalerta_id')->references('id')->on('estadoalertas')->onDelete('cascade');
                $table->foreign('tipoevento_id')->references('id')->on('tipoeventos')->onDelete('cascade');
    
                $table->softDeletes();
                $table->timestamps();
            });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('estadoalertas');
        Schema::dropIfExists('tipoeventos');
    }
}
