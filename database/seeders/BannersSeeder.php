<?php

namespace Database\Seeders;

use App\Models\Tenant\Banners;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new Banners();
    $banner->id_configuracion = 1;
    $banner->titulo_imagen = 'Banner 1';
    $banner->texto_boton = 'Boton 1';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = 1;
    $banner->titulo_imagen = 'Banner 2';
    $banner->texto_boton = 'Boton 2';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = 1;
    $banner->titulo_imagen = 'Banner 3';
    $banner->texto_boton = 'Boton 3';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/1920x800.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = 1;
    $banner->titulo_imagen = 'Banner 4';
    $banner->texto_boton = 'Boton 4';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = 1;
    $banner->titulo_imagen = 'Banner 5';
    $banner->texto_boton = 'Boton 5';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = 1;
    $banner->titulo_imagen = 'Banner 6';
    $banner->texto_boton = 'Boton 6';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    }
}
