<?php

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\JenisKunjungan;
use App\Models\Pasien;
use App\Models\Penjamin;
use App\Models\Perawat;
use App\Models\PoliTujuan;
use App\Models\RuangRawat;
use App\Models\SkriningVisual;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_registrasi');
            // $table->string('nomor_rekam_medis');
            // $table->string('nama_pasien');
            $table->string('tgl_berobat');
            $table->enum('status_pcare',['y','t'])->default('t');
            $table->enum('status_satu_sehat',['y','t'])->default('t');
            $table->enum('status_antrian',['y','t'])->default('t');
            $table->enum('jenis_rawat',['rawat_jalan','promotif_preventif'])->default('rawat_jalan');
            $table->enum('status_kunjungan',['online','offline'])->default('offline');
            $table->enum('status_kasir',['y','t'])->default('y');
            $table->foreignIdFor(Pasien::class);
            $table->foreignIdFor(SkriningVisual::class);
            $table->foreignIdFor(Antrian::class)->nullable();
            $table->foreignIdFor(Penjamin::class);
            $table->foreignIdFor(JenisKunjungan::class);
            $table->foreignIdFor(PoliTujuan::class);
            $table->foreignIdFor(RuangRawat::class);
            $table->foreignIdFor(Dokter::class);
            $table->foreignIdFor(Perawat::class);
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_pasiens');
    }
};
