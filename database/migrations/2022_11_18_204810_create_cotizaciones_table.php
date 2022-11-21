<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{

    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('identificacion_cliente');
            $table->string('telefono_cliente');
            $table->string('direccion_cliente');
            $table->text('observacion');
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('vehiculo_id');

            $table->foreign('user_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cotizacionesdetalles', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('costoventa');
            $table->string('costototal');
            $table->string('nombreproducto');
            
            $table->unsignedBigInteger('cargueinventario_id');
            $table->unsignedBigInteger('cotizacione_id');

            $table->foreign('cargueinventario_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('cotizacione_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizacionesdetalles');
        Schema::dropIfExists('cotizaciones');
    }
}
