<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasTable extends Migration
{

    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('enlista');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('unidadesmedidas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('alertaordenes', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->date('fecha_alerta');
            $table->date('fecha_mantenimiento');
            $table->integer('km_prom_dia');
            $table->integer('km_mantenimiento');
            $table->date('fecha_ultima_llamada');
            $table->integer('cant_llamadas');
            $table->text('observaciones');

            $table->unsignedBigInteger('alerta_id')->nullable();
            $table->unsignedBigInteger('unidadesmedida_id')->nullable();
            $table->unsignedBigInteger('ordentrabajo_id')->nullable();
            $table->unsignedBigInteger('estadoalerta_id')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('vehiculo_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('prefactura_id')->nullable();
            $table->unsignedBigInteger('factura_id')->nullable();

            $table->foreign('alerta_id')->references('id')->on('alertas')->onDelete('cascade');
            $table->foreign('unidadesmedida_id')->references('id')->on('unidadesmedidas')->onDelete('cascade');
            $table->foreign('ordentrabajo_id')->references('id')->on('ordentrabajos')->onDelete('cascade');
            $table->foreign('estadoalerta_id')->references('id')->on('estadoalertas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prefactura_id')->references('id')->on('prefacturas')->onDelete('cascade');
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alertaordenes');
        Schema::dropIfExists('unidadesmedidas');
        Schema::dropIfExists('alertas');
    }
}
