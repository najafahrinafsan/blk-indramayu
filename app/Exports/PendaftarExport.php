<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftarExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    public function collection()
    {
        return Pendaftaran::with('kategori')
            ->latest()
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'No HP',
            'Email',
            'Pendidikan Terakhir',
            'Kategori Pelatihan',
            'Status',
            'Tanggal Daftar',
        ];
    }

    public function map($pendaftaran): array
    {
        static $no = 0;

        $no++;

        return [
            $no,
            $pendaftaran->nama_lengkap,
            $pendaftaran->nik,
            $pendaftaran->tempat_lahir,
            $pendaftaran->tanggal_lahir,
            $pendaftaran->jenis_kelamin,
            $pendaftaran->alamat,
            $pendaftaran->no_hp,
            $pendaftaran->email,
            $pendaftaran->pendidikan_terakhir,
            optional($pendaftaran->kategori)->nama_kategori ?? '-',
            $pendaftaran->status,
            $pendaftaran->created_at
                ? $pendaftaran->created_at->format('d-m-Y H:i')
                : '-',
        ];
    }
}