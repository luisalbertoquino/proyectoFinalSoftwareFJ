<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('serialVenta');
            $table->integer('numeroVenta');
            $table->bigInteger('idProducto');
            $table->integer('cantidadProducto'); 
            $table->integer('subtotal');
            $table->double('iva', 100, 2);
            $table->double('ivaAcum', 100, 2);
            $table->double('descuentoPorcentaje', 100, 2);
            $table->double('impuesto', 100, 2);
            $table->double('totalDescontado', 100, 2);
            $table->double('total', 100, 2);
            $table->bigInteger('idCliente');
            $table->date('fechaEmision');
            $table->bigInteger('idUsuario');
            $table->boolean('estado');

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
        Schema::dropIfExists('sale');
    }
}
