<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipopagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipopagos', function (Blueprint $table) {
            $table->id();
            $table->integer('contabilizar');
            $table->text('descripcion');

            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('cuenta_id')->nullable();

            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');

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
        Schema::dropIfExists('tipopagos');
    }
}
