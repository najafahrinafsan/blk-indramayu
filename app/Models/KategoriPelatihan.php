<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPelatihan extends Model
{
    use HasFactory;

    protected $table = 'kategori_pelatihans';

    protected $fillable = [
    'nama',
    'deskripsi',
    'gambar',
    'status',
    'sumber_anggaran',
];
}