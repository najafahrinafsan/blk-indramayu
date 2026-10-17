<?php

namespace App\Exports;

use App\Models\SurveiKepekerjaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SurveiKepekerjaanExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    /**
     * Mengambil seluruh data survei
     */
    public function collection()
    {
        return SurveiKepekerjaan::latest()->get();
    }

    /**
     * Header Excel
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Program Pelatihan',
            'Tahun Lulus Pelatihan',
            'Nama Perusahaan / Usaha',
            'Alamat Perusahaan / Usaha',
            'Status Kerja',
            'Jabatan',
            'Bulan & Tahun Mulai Bekerja',
            'Tanggal Pengisian',
        ];
    }

    /**
     * Mapping data ke Excel
     */
    public function map($survei): array
    {
        static $no = 0;

        $no++;

        return [
            $no,
            $survei->nama_lengkap,
            $survei->program_pelatihan,
            $survei->tahun_lulus,
            $survei->nama_perusahaan_usaha,
            $survei->alamat_perusahaan_usaha,
            $survei->status_kerja,
            $survei->jabatan,
            $survei->tanggal_mulai_bekerja
                ? $survei->tanggal_mulai_bekerja->format('m-Y')
                : '-',
            $survei->created_at
                ? $survei->created_at->format('d-m-Y H:i')
                : '-',
        ];
    }
}