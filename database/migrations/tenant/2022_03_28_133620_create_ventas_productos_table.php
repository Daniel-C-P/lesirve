<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tipo_pago');
            $table->unsignedBigInteger('id_estado_venta');
            $table->unsignedBigInteger('id_estado_pago');
            $table->double('total');
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_tipo_pago')->references('id')->on('tipos_pagos');
            $table->foreign('id_estado_venta')->references('id')->on('estados_ventas');
            $table->foreign('id_estado_pago')->references('id')->on('estados_pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_productos');
    }
};
