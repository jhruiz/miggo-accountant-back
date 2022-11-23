<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecargueinventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precargueinventarios', function (Blueprint $table) {
            $table->id();
            $table->string('costoproducto');
            $table->integer('cantidad');
            $table->BigInteger('user_id');

            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('deposito_id');
            //$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('proveedore_id');
            $table->unsignedBigInteger('tipopago_id');

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('deposito_id')->references('id')->on('depositos')->onDelete('cascade');
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('proveedore_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('tipopago_id')->references('id')->on('tipopagos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('precargueinventario_impuesto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('precargueinventario_id');
            $table->unsignedBigInteger('impuesto_id');

            $table->foreign('precargueinventario_id')->references('id')->on('precargueinventarios')->onDelete('cascade');
            $table->foreign('impuesto_id')->references('id')->on('impuestos')->onDelete('cascade');

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
        Schema::dropIfExists('precargueinventario_impuesto');
        Schema::dropIfExists('precargueinventarios');
    }
}
