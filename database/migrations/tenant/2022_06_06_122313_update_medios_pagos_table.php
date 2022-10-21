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
        Schema::table('medios_pagos', function(Blueprint $table){
          $table->string('cuenta')->default(null)->nullable(true);
          $table->enum('tipo_cuenta', ['N/A', 'CORRIENTE', 'AHORROS'])->default('N/A')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
