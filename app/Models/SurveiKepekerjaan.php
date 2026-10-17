<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveiKepekerjaan extends Model
{
    protected $table = 'survei_kepekerjaans';

    protected $fillable = [
        'nama_lengkap',
        'program_pelatihan',
        'tahun_lulus',
        'nama_perusahaan_usaha',
        'alamat_perusahaan_usaha',
        'status_kerja',
        'jabatan',
        'tanggal_mulai_bekerja',
    ];

    protected $casts = [
        'tahun_lulus' => 'integer',
        'tanggal_mulai_bekerja' => 'date',
    ];
}