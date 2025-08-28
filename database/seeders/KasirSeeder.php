<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kasirs')->insert([
            'code' => '202'.(1 + DB::table('kasirs')->max('id') ?? 0),
            'name' => 'kasir',
            'username' => 'kasir',
            'no_telp' => '08988888888',
            'password' => bcrypt('kasir123'),
        ]);
    }
}
