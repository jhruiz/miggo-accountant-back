<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{

    public function up()
    {
        
        Schema::create('cloudmenus', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->text('url')->nullable();
            $table->string('imagen')->nullable();
            $table->string('orden')->nullable();
            $table->string('administrador')->nullable();
            $table->text('ayuda')->nullable();

            $table->integer('cloudmenu_id')->nullable();
            //$table->unsignedBigInteger('cloudmenu_id')->nullable();

            //$table->foreign('cloudmenu_id')->references('id')->on('cloudmenus')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->text('acciones')->nullable();
            $table->text('columnas')->nullable();

            $table->unsignedBigInteger('perfile_id')->nullable();
            $table->unsignedBigInteger('cloudmenu_id')->nullable();
            
            $table->foreign('perfile_id')->references('id')->on('perfiles')->onDelete('cascade');
            $table->foreign('cloudmenu_id')->references('id')->on('cloudmenus')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cloudmenu_perfile', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('perfile_id');
            $table->unsignedBigInteger('cloudmenu_id');
            
            $table->foreign('perfile_id')->references('id')->on('perfiles')->onDelete('cascade');
            $table->foreign('cloudmenu_id')->references('id')->on('cloudmenus')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        /*
        Schema::create('menuprincipales', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('clase_icon');

            $table->softDeletes();
            $table->timestamps();
        });
*/

    }

    public function down()
    {
        //Schema::dropIfExists('menuprincipales');
        Schema::dropIfExists('cloudmenu_perfile');
        Schema::dropIfExists('permisos');
        Schema::dropIfExists('cloudmenus');
    }
}
