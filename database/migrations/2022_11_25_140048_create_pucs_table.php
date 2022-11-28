<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePucsTable extends Migration
{
    public function up()
    {
        Schema::create('pucs', function (Blueprint $table) {
            $table->id();
            $table->string('cuenta');
            $table->text('descripcion');
            $table->integer('nivel');
            $table->string('naturaleza');
            $table->BigInteger('user_id')->nullable();

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pucs');
    }
}
