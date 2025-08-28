<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            'code' => '303'.(1 + DB::table('members')->max('id') ?? 0),
            'name' => 'adit',
            'username' => 'adit',
            'no_telp' => '08988888333',
            'password' => bcrypt('adit123'),
            'paket' => 1,
            'kode_qr' => 'coba-coba',
            'tanggal_buat' => date('Y-m-d'),
            'kasirs_id' => 1,
        ]);
    }
}
