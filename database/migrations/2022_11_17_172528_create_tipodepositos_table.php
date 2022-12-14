<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipodepositosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipodepositos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            
            $table->timestamps();
        });

        Schema::create('depositos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('telefono');
            $table->text('direccion');
            $table->text('nombredocumentoventa');
            $table->text('resolucionfacturacion');
            $table->date('fecharesolucion');
            $table->string('prefijo');
            $table->text('nota');
            $table->string('resolucioninicia');
            $table->string('resolucionfin');
            $table->string('numresolucionactual');
            $table->integer('estadisticas');

            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('ciudade_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('regimene_id');
            $table->unsignedBigInteger('tipodeposito_id')->unsigned()->nullable();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('ciudade_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('regimene_id')->references('id')->on('regimenes')->onDelete('cascade');
            $table->foreign('tipodeposito_id')->references('id')->on('tipodepositos')->onDelete('cascade');
            
            $table->timestamps();
        });

        Schema::create('deposito_cliente_empresa', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('deposito_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('deposito_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
           
            $table->timestamps();
        });

        Schema::create('deposito_usuario_empresa', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('deposito_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('empresa_id');

            $table->foreign('deposito_id')->references('id')->on('depositos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
           
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
        Schema::dropIfExists('deposito_usuario_empresa');
        Schema::dropIfExists('deposito_cliente_empresa');
        Schema::dropIfExists('depositos');
        Schema::dropIfExists('tipodepositos');
    }
}
