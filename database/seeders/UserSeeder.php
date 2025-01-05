<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed user admin
        $adi = User::updateOrCreate(
            ['email' => 'admin@email.com'], // Kriteria unik berdasarkan email
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'),
            ]
        );
        $adi->assignRole('admin');

        // Seed user operator 1
        $budi = User::updateOrCreate(
            ['email' => 'operator@email.com'],
            [
                'name' => 'Operator',
                'password' => bcrypt('operator'),
            ]
        );
        $budi->assignRole('operator');

        // Seed user operator 2
        $cindy = User::updateOrCreate(
            ['email' => 'dokter@email.com'],
            [
                'name' => 'dokter',
                'password' => bcrypt('dokter'),
            ]
        );
        $cindy->assignRole('dokter');
        // $cindy->givePermissionTo('delete users');
    }
}
