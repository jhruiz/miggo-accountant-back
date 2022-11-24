<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilesTable extends Migration
{

    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->text('description');

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('perfiles');
    }
}
