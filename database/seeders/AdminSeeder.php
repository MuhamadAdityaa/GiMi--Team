<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'code' => '101'.(1 + DB::table('admins')->max('id') ?? 0),
            'name' => 'admin',
            'username' => 'admin',
            'no_telp' => '08999999999',
            'password' => bcrypt('admin123'),
        ]);

    }

}
