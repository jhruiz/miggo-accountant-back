<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegimenesTable extends Migration
{

    public function up()
    {
        Schema::create('regimenes', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipocontribuyentes', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tiposociedades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->text('descripcion');
            $table->integer('puc_id')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('tiposociedades');
        Schema::dropIfExists('tipocontribuyentes');
        Schema::dropIfExists('regimenes');
    }
}
