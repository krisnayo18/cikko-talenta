<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliTujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('poli_tujuans')->insert([
            [
                'kode'       => 'PT001',
                'nama' => 'Apotek',
            ],
            [
                'kode'       => 'PT002',
                'nama' => 'Klinik Gigi',
            ],
            [
                'kode'       => 'PT003',
                'nama' => 'Klinik KIA',
            ],
            [
                'kode'       => 'PT004',
                'nama' => 'Klinik UMUM',
            ],
            [
                'kode'       => 'PT005',
                'nama' => 'UGD',
            ],
            [
                'kode'       => 'PT006',
                'nama' => 'laboratorium',
            ],
        ]);
    }
}
