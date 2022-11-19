<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidaddias');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('licencia_empresa', function (Blueprint $table) {
            $table->id();
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->string('codigo');
            $table->string('cantidad');

            $table->unsignedBigInteger('licencia_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('estado_id');

            $table->foreign('licencia_id')->references('id')->on('licencias')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estadoalertas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('licencias_usuarios', function (Blueprint $table) {
            $table->id();
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->string('codigo');

            $table->unsignedBigInteger('licencia_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('estado_id');

            $table->foreign('licencia_id')->references('id')->on('licencias')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencias_usuarios');
        Schema::dropIfExists('licencia_empresa');
        Schema::dropIfExists('licencias');
    }
}
