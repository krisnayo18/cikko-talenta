<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_kunjungans')->insert([
            [
                'kode'       => 'JK001',
                'keterangan' => 'Kunjungan Sakit',
            ],
            [
                'kode'       => 'JK002',
                'keterangan' => 'Pasien lansia, ibu hamil, anak dibawah 1 tahun, penyakit menular, pasien diasis,
                                pasien kemoterapi, korban tindak kekerasan dan pasien percobaan bunuh
                                diri',
            ],
            [
                'kode'       => 'JK003',
                'keterangan' => 'Pasien Kegawat Daruratan',
            ],

        ]);
    }
}
