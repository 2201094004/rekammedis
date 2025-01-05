<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SistemPembayaranSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sistem_pembayaran')->insert([
            ['nama_pembayaran' => 'BPJS', 'deskripsi' => 'Pembayaran melalui asuransi BPJS'],
            ['nama_pembayaran' => 'Tunai', 'deskripsi' => 'Pembayaran secara tunai di kasir'],
            ['nama_pembayaran' => 'Kartu Kredit', 'deskripsi' => 'Pembayaran menggunakan kartu kredit'],
        ]);
    }
}
