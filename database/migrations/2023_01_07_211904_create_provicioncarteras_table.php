<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvicioncarterasTable extends Migration
{

    public function up()
    {
        Schema::create('provicioncarteras', function (Blueprint $table) {
            $table->id();
            $table->date('diainicial');
            $table->date('diafinal');
            $table->double('PorcentajeAnual');
            $table->double('PorcentajeDiario');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provicioncarteras');
    }
}
