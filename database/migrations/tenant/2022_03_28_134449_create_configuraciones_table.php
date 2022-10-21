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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->string('id_plantilla')->nullable();
            $table->string('nombre_tienda')->default('Mi tienda');
            $table->string('descripcion')->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('direccion')->nullable();
            $table->string('correo')->nullable();
            $table->string('color_p')->nullable()->default('#A03B41');
            $table->string('color_s')->nullable()->default('#F56449');
            $table->string('logo')->nullable();
            $table->char('config')->default('0');
            $table->string('imagen_banner_1')->nullable()->default(null);
            $table->string('titulo_banner_1')->nullable()->default(null);
            $table->string('descripcion_banner_1')->nullable()->default(null);
            $table->string('imagen_banner_2')->nullable()->default(null);
            $table->string('titulo_banner_2')->nullable()->default(null);
            $table->string('descripcion_banner_2')->nullable()->default(null);
            $table->string('imagen_banner_3')->nullable()->default(null);
            $table->string('titulo_banner_3')->nullable()->default(null);
            $table->string('descripcion_banner_3')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('whatsapp')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->string('youtube')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuraciones');
    }
};
