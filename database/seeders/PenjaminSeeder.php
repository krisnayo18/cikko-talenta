<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penjamins')->insert([
            [
                'kode'       => 'PP001',
                'nama' => 'BPJS KESEHATAN',
            ],
            [
                'kode'       => 'PP002',
                'nama' => 'MANDIRI',
            ],
            [
                'kode'       => 'PP003',
                'nama' => 'SEHAT TENTRAM',
            ],

        ]);
    }
}
