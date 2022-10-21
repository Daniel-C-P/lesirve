<?php

namespace Database\Seeders;

use App\Models\Tenant\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $menu = new Menu();
      $menu->nombre = 'Descuentos';
      $menu->url = '/descuentos';
      $menu->save();
    }
}
