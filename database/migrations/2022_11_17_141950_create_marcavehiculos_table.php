<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcavehiculosTable extends Migration
{

    public function up()
    {
        Schema::create('marcavehiculos', function (Blueprint $table) {
            $table->id();
            $table->text('description');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('marcavehiculos');
    }
}
