<?php

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
        Schema::create('perawats', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['L','P']);
            $table->text('alamat');
            $table->string('nomor_hp', 50);
            $table->string('bagian', 50)->nullable();
            $table->date('tanggal_lahir');
            $table->date('tanggal_gabung');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawats');
    }
};
