<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert(
        [
            'role' => 'member',
            'name' => 'adit',
            'username' => 'adit',
            'no_telp' => '08988888333',
            'password' => bcrypt('adit123'),
            'paket' => 1,
            'kode_qr' => 'coba-coba',
            'tanggal_buat' => carbon::now()->toDateString(),
            'tanggal_berakhir' => carbon::now()->addDays(30)->toDateString(),
            'kasirs_id' => 1,
        ],
        [
            'role' => 'member',
            'name' => 'budi',
            'username' => 'budi',
            'no_telp' => '08988888444',
            'password' => bcrypt('budi123'),
            'paket' => 1,
            'kode_qr' => 'coba-coba',
            'tanggal_buat' => carbon::now()->toDateString(),
            'tanggal_berakhir' => carbon::now()->addDays(30)->toDateString(),
            'kasirs_id' => 1,
        ],
        [
            'role' => 'member',
            'name' => 'caca',
            'username' => 'caca',
            'no_telp' => '08988888555',
            'password' => bcrypt('caca123'),
            'paket' => 2,
            'kode_qr' => 'coba-coba',
            'tanggal_buat' => carbon::now()->toDateString(),
            'tanggal_berakhir' => carbon::now()->addDays(60)->toDateString(),
            'kasirs_id' => 1,
        ]
    );
    }
}
