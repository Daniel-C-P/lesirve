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
        Schema::dropIfExists('banners');
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_configuracion');
            $table->string('titulo_imagen')->nullable()->default(null);
            $table->string('texto_boton')->nullable()->default(null);
            $table->string('URL_imagen')->nullable()->default(null);
            $table->string('URL_funcion')->nullable()->default(null);

            $table->foreign('id_configuracion')->references('id')->on('configuraciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
