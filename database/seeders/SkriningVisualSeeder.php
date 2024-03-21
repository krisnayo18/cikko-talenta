<?php

namespace Database\Seeders;

use App\Models\SkriningVisual;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkriningVisualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skrining_visuals')->insert([
            [
                'kode'       => 'SV001',
                'keterangan' => 'Pasien Stabil',
            ],
            [
                'kode'       => 'SV002',
                'keterangan' => 'Pasien lansia, ibu hamil, anak dibawah 1 tahun, penyakit menular, pasien diasis,
                                pasien kemoterapi, korban tindak kekerasan dan pasien percobaan bunuh
                                diri',
            ],
            [
                'kode'       => 'SV003',
                'keterangan' => 'Pasien Kegawat Daruratan',
            ],

        ]);
    }
}
