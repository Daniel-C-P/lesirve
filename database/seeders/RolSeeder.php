<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name' => 'principal.admin']);
        $rol2 = Role::create(['name' => 'principal.usuarios']);

        Permission::create(['name' => 'principal.admin.home'])->syncRoles([$rol1]);
        Permission::create(['name' => 'principal.usuarios.home'])->syncRoles([$rol2]);

        Permission::create(['name' => 'principal.admin.tenants.update'])->syncRoles([$rol1]);
        Permission::create(['name' => 'principal.admin.tenants.edit'])->syncRoles([$rol1]);
        Permission::create(['name' => 'principal.admin.tenants.index'])->syncRoles([$rol1]);

        Permission::create(['name' => 'principal.admin.usuarios.update'])->syncRoles([$rol2]);
        Permission::create(['name' => 'principal.admin.usuarios.edit'])->syncRoles([$rol2]);
        Permission::create(['name' => 'principal.admin.usuarios.index'])->syncRoles([$rol2]);

    }
}
