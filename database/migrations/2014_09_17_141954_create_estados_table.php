<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{

    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->text('modulo');

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
