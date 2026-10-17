<?php

namespace App\Models;

use App\Models\KategoriPelatihan;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';

    protected $fillable = [

        'nama_lengkap',

        'nik',

        'tempat_lahir',

        'tanggal_lahir',

        'jenis_kelamin',

        'alamat',

        'no_hp',

        'email',

        'pendidikan_terakhir',

        'program_pelatihan',

        'status',

    ];

    public function kategori()
{
    return $this->belongsTo(
        KategoriPelatihan::class,
        'kategori_id'
    );
}

}