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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('telefono', 10);
            $table->string('correo');
            $table->text('contrasenia');
            $table->string('nombre', 45);
            $table->string('direccion', 45);
            $table->string('ciudad', 15);
            $table->boolean('suscrito')->default(false);
            $table->char('config')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
