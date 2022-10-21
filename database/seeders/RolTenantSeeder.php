<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolTenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name' => 'tenant.admin']);
        $rol2 = Role::create(['name' => 'tenant.usuarios']);

        Permission::create(['name' => 'tenant.admin.home'])->syncRoles([$rol1]);
        Permission::create(['name' => 'tenant.usuarios.home'])->syncRoles([$rol2]);

        Permission::create(['name' => 'tenant.admin.tenants.update'])->syncRoles([$rol1]);
        Permission::create(['name' => 'tenant.admin.tenants.edit'])->syncRoles([$rol1]);
        Permission::create(['name' => 'tenant.admin.tenants.index'])->syncRoles([$rol1]);

        Permission::create(['name' => 'tenant.admin.usuarios.update'])->syncRoles([$rol2]);
        Permission::create(['name' => 'tenant.admin.usuarios.edit'])->syncRoles([$rol2]);
        Permission::create(['name' => 'tenant.admin.usuarios.index'])->syncRoles([$rol2]);

    }
}
