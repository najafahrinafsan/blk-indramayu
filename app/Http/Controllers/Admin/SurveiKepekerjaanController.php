<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveiKepekerjaan;
use Illuminate\Http\Request;
use App\Exports\SurveiKepekerjaanExport;
use Maatwebsite\Excel\Facades\Excel;

class SurveiKepekerjaanController extends Controller
{
    /**
     * FORM SURVEI - PUBLIK
     */
    public function publicCreate()
    {
        return view('dashboard.informasi.survei-kepekerjaan');
    }

    /**
     * SIMPAN SURVEI - PUBLIK
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => [
                'required',
                'string',
                'max:255'
            ],

            'program_pelatihan' => [
                'required',
                'string',
                'max:255'
            ],

            'tahun_lulus' => [
                'required',
                'integer',
                'digits:4',
                'min:1900',
                'max:' . date('Y')
            ],

            'nama_perusahaan_usaha' => [
                'required',
                'string',
                'max:255'
            ],

            'alamat_perusahaan_usaha' => [
                'required',
                'string'
            ],

            'status_kerja' => [
                'required',
                'in:Owner,Kontrak,Magang,Tetap,Harian'
            ],

            'jabatan' => [
                'required',
                'string',
                'max:255'
            ],

            'tanggal_mulai_bekerja' => [
                'required',
                'date_format:Y-m'
            ],
        ], [
            'nama_lengkap.required' =>
                'Nama lengkap wajib diisi.',

            'program_pelatihan.required' =>
                'Program pelatihan wajib diisi.',

            'tahun_lulus.required' =>
                'Tahun lulus wajib diisi.',

            'tahun_lulus.digits' =>
                'Tahun lulus harus terdiri dari 4 angka.',

            'nama_perusahaan_usaha.required' =>
                'Nama perusahaan/usaha wajib diisi.',

            'alamat_perusahaan_usaha.required' =>
                'Alamat perusahaan/usaha wajib diisi.',

            'status_kerja.required' =>
                'Status kerja wajib dipilih.',

            'status_kerja.in' =>
                'Status kerja yang dipilih tidak valid.',

            'jabatan.required' =>
                'Jabatan wajib diisi.',

            'tanggal_mulai_bekerja.required' =>
                'Bulan dan tahun mulai bekerja wajib diisi.',

            'tanggal_mulai_bekerja.date_format' =>
                'Format bulan dan tahun mulai bekerja tidak valid.',
        ]);

        // Input dari type="month" berbentuk YYYY-MM.
        // Database menggunakan DATE, sehingga ditambahkan tanggal 01.
        $validated['tanggal_mulai_bekerja'] .= '-01';

        SurveiKepekerjaan::create($validated);

        return redirect()
            ->route('survei.kepekerjaan')
            ->with(
                'success',
                'Terima kasih. Data survei kepekerjaan Anda berhasil dikirim.'
            );
    }

    /**
     * DAFTAR SURVEI - ADMIN
     */
    public function index()
    {
        $surveis = SurveiKepekerjaan::latest()
            ->paginate(10);

        return view(
            'admin.survei-kepekerjaan.index',
            compact('surveis')
        );
    }

    /**
     * DETAIL SURVEI - ADMIN
     */
    public function show($id)
    {
        $survei = SurveiKepekerjaan::findOrFail($id);

        return view(
            'admin.survei-kepekerjaan.show',
            compact('survei')
        );
    }

    /**
     * FORM EDIT - ADMIN
     */
    public function edit($id)
    {
        $survei = SurveiKepekerjaan::findOrFail($id);

        return view(
            'admin.survei-kepekerjaan.edit',
            compact('survei')
        );
    }

    /**
     * UPDATE DATA - ADMIN
     */
    public function update(Request $request, $id)
    {
        $survei = SurveiKepekerjaan::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => [
                'required',
                'string',
                'max:255'
            ],

            'program_pelatihan' => [
                'required',
                'string',
                'max:255'
            ],

            'tahun_lulus' => [
                'required',
                'integer',
                'digits:4',
                'min:1900',
                'max:' . date('Y')
            ],

            'nama_perusahaan_usaha' => [
                'required',
                'string',
                'max:255'
            ],

            'alamat_perusahaan_usaha' => [
                'required',
                'string'
            ],

            'status_kerja' => [
                'required',
                'in:Owner,Kontrak,Magang,Tetap,Harian'
            ],

            'jabatan' => [
                'required',
                'string',
                'max:255'
            ],

            'tanggal_mulai_bekerja' => [
                'required',
                'date_format:Y-m'
            ],
        ], [
            'nama_lengkap.required' =>
                'Nama lengkap wajib diisi.',

            'program_pelatihan.required' =>
                'Program pelatihan wajib diisi.',

            'tahun_lulus.required' =>
                'Tahun lulus wajib diisi.',

            'tahun_lulus.digits' =>
                'Tahun lulus harus terdiri dari 4 angka.',

            'nama_perusahaan_usaha.required' =>
                'Nama perusahaan/usaha wajib diisi.',

            'alamat_perusahaan_usaha.required' =>
                'Alamat perusahaan/usaha wajib diisi.',

            'status_kerja.required' =>
                'Status kerja wajib dipilih.',

            'status_kerja.in' =>
                'Status kerja yang dipilih tidak valid.',

            'jabatan.required' =>
                'Jabatan wajib diisi.',

            'tanggal_mulai_bekerja.required' =>
                'Bulan dan tahun mulai bekerja wajib diisi.',

            'tanggal_mulai_bekerja.date_format' =>
                'Format bulan dan tahun mulai bekerja tidak valid.',
        ]);

        // Input type="month" menghasilkan YYYY-MM.
        // Tambahkan tanggal 01 agar sesuai dengan kolom DATE.
        $validated['tanggal_mulai_bekerja'] .= '-01';

        $survei->update($validated);

        return redirect()
            ->route('admin.survei.kepekerjaan.index')
            ->with(
                'success',
                'Data survei kepekerjaan berhasil diperbarui.'
            );
    }

    /**
     * HAPUS DATA - ADMIN
     */
    public function destroy($id)
    {
        $survei = SurveiKepekerjaan::findOrFail($id);

        $survei->delete();

        return redirect()
            ->route('admin.survei.kepekerjaan.index')
            ->with(
                'success',
                'Data survei kepekerjaan berhasil dihapus.'
            );
    }

    /**
     * DOWNLOAD EXCEL - ADMIN
     */
    public function download()
    {
        return Excel::download(
            new SurveiKepekerjaanExport,
            'survei-kepekerjaan-' . date('d-m-Y') . '.xlsx'
        );
    }
}