<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetencionfuentesTable extends Migration
{

    public function up()
    {
        Schema::create('pagadoas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('comprobantedetalles', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('numerocomprobante');
            $table->string('numerocheque');
            $table->string('numerobono');
            $table->string('numerotarjeta');
            $table->string('numerorecibo');
            $table->string('beneficiario');
            $table->double('valorefectivo');
            $table->double('valortrasferencia');
            $table->double('valortargeta');
            $table->double('valorbonos');
            $table->double('valor');

            // $table->unsignedBigInteger('tipopago_id'); TODO: buscar tablas relaciones exitentes
            // $table->unsignedBigInteger('cuentabanco_id');
            // $table->unsignedBigInteger('caja_id');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('retencionfuentes', function (Blueprint $table) {
            $table->id();
            $table->integer('consecutivo');
            $table->date('fechapago');
            $table->boolean('pagototal')->default('0');//activo o desctivado
            $table->boolean('tipoconsolidado')->default('0');//activo o desctivado
            $table->string('nivelcentroCosto');
            $table->date('rangofechadesde');
            $table->date('rangofechahasta');
            $table->double('totalpagar');//debe irse a una cuenta por pagar
            $table->string('interesesmora');
            $table->string('sanciones');
            $table->double('netopagar');


            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('pagadoa_id');
            $table->unsignedBigInteger('centrocosto_id');
            $table->unsignedBigInteger('comprobantedetalle_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('pagadoa_id')->references('id')->on('pagadoas')->onDelete('cascade');
            $table->foreign('centrocosto_id')->references('id')->on('centrocostos')->onDelete('cascade');
            $table->foreign('comprobantedetalle_id')->references('id')->on('comprobantedetalles')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('retencionfuentes');
        Schema::dropIfExists('comprobantedetalles');
        Schema::dropIfExists('pagadoas');
    }
}
