<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdentrabajosSuministrosTable extends Migration
{
     public function up()
    {
        Schema::create('ordentrabajos_suministros', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');

            $table->unsignedBigInteger('ordentrabajo_id');
            $table->unsignedBigInteger('cargueinventario_id');

            $table->foreign('ordentrabajo_id')->references('id')->on('ordentrabajos')->onDelete('cascade');
            $table->foreign('cargueinventario_id')->references('id')->on('cargueinventarios')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordentrabajos_suministros');
    }
}
