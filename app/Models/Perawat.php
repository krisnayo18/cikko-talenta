<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'nomor_hp',
        'email',
        'alamat',
        'bagian',
        'tanggal_lahir',
        'tanggal_gabung',
    ];
}
