<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kasirs = [1, 2]; // hanya 2 kasir
        $members = [1, 2, 3, 5]; // 4 member

        $laporans = [];

        // Generate data untuk kasir saja (tanpa member)
        foreach ($kasirs as $kasir_id) {
            // random jumlah entri antara 3-7
            $jumlah = rand(3, 7);
            for ($i = 0; $i < $jumlah; $i++) {
                $tanggal = Carbon::now()->subDays(rand(0, 29))->format('Y-m-d');
                $laporans[] = [
                    'kasir_id' => $kasir_id,
                    'member_id' => null,
                    'tanggal' => $tanggal,
                ];
            }
        }

        // Generate data untuk member saja (tanpa kasir)
        foreach ($members as $member_id) {
            $jumlah = rand(3, 7);
            for ($i = 0; $i < $jumlah; $i++) {
                $tanggal = Carbon::now()->subDays(rand(0, 29))->format('Y-m-d');
                $laporans[] = [
                    'kasir_id' => null,
                    'member_id' => $member_id,
                    'tanggal' => $tanggal,
                ];
            }
        }

        // Insert semua data sekaligus
        DB::table('laporans')->insert($laporans);
    }
}
