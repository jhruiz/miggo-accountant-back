<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{

    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->text('numerocuenta');
            $table->text('saldo');
            $table->date('fecha');
            $table->string('factura');
            $table->text('concepto');//tipo de pago foreign key
            $table->double('debe');
            $table->double('haber');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bancaria', function (Blueprint $table) {//estado cargado desde el banco 
            $table->id();
            $table->date('fecha');
            $table->text('concepto');
            $table->double('importe');
            $table->double('saldo');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('conciliacionbancarias', function (Blueprint $table) {
            $table->id();
            $table->double('bancariopagos');
            $table->double('bancariocobros');
            $table->double('auxiliarpagos');
            $table->double('auxiliarcobros');

            $table->date('inicio');
            $table->date('fin');
            $table->double('diferencia');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
