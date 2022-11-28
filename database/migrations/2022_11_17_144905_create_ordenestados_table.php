<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenestadosTable extends Migration
{
    public function up()
    {
        Schema::create('ordenestados', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('ordenfinal');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenestados');
    }
}
