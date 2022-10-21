<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Principal\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre' => 'cliente 1',
            'usuario' => 'cliente12',
            'correo' => 'cliente12@clientes.com',
            'contrasenia' => '12345678',
            'telefono' => '3312312421',
        ]);
    }
}
