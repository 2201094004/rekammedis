<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat role admin dan operator
        $admin = Role::updateOrCreate(['name' => 'admin']);
        $operator = Role::updateOrCreate(['name' => 'operator']);
        $dokter = Role::updateOrCreate(['name' => 'dokter']);

        // Memberikan semua permission kepada role admin
        $admin->givePermissionTo(Permission::all());

        $dokter->givePermissionTo(Permission::all());


        // Memberikan permission tertentu kepada role operator
        $operator->givePermissionTo(['show users', 'add users', 'edit users']);
    }
}
