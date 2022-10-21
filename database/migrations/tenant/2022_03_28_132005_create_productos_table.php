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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_categoria');
            $table->string('nombre');
            $table->string('descripcion_corta', 30);
            $table->string('descripcion_larga', 200);
            $table->double('precio');
            $table->string('imagen_1')->nullable(false);
            $table->string('imagen_2')->nullable()->default('NULL');
            $table->string('imagen_3')->nullable()->default('NULL');
            $table->string('imagen_4')->nullable()->default('NULL');
            $table->boolean('en_oferta')->default(false);
            $table->double('valor_descuento');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
