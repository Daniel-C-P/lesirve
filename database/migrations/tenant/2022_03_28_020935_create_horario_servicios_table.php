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
        Schema::create('horario_servicios', function (Blueprint $table) {
            $table->id();
            $table->enum('dia', [1, 2, 3, 4, 5, 6, 7]);
            $table->unsignedBigInteger('id_servicio');
            $table->foreign('id_servicio')->references('id')->on('servicios');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->boolean('habilitado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_servicios');
    }
};
