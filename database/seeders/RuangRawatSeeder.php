<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuangRawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruang_rawats')->insert([
            [
                'kode'       => 'RR101',
                'lantai' => '1',
                'nama' => 'Klinik Umum',
            ],
            [
                'kode'       => 'RR102',
                'lantai' => '1',
                'nama' => 'Ruang Obat',
            ],
            [
                'kode'       => 'RR103',
                'lantai' => '1',
                'nama' => 'Ruang Tindakan',
            ],
            [
                'kode'       => 'RR104',
                'lantai' => '1',
                'nama' => 'Ruang Pendaftaran/Kasir',
            ],
            [
                'kode'       => 'RR201',
                'lantai' => '2',
                'nama' => 'Klinik Gigi',
            ],
            [
                'kode'       => 'RR202',
                'lantai' => '2',
                'nama' => 'Ruang Laboratorium',
            ],
        ]);
    }
}
