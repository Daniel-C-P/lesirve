<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Principal\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Usuario admin',
            'email' => 'admin@hotmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('tenant.admin');

        // User::create([
        //     'name' => 'usuario normal',
        //     'email' => 'normal@hotmail.com',
        //     'password' => Hash::make('12345678'),
        // ])->assignRole('tenant.usuarios');

    }
}
