<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Exports\PendaftarExport;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan halaman pendaftaran
     */
    public function index()
    {
        return view('dashboard.pendaftaran.index');
    }
    

    public function download()
{
    return Excel::download(
        new PendaftarExport,
        'data-pendaftar-' . date('d-m-Y') . '.xlsx'
    );
}


    /**
     * Menyimpan data pendaftaran
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama_lengkap' => [
                'required',
                'string',
                'max:255'
            ],

            'nik' => [
                'required',
                'digits:16'
            ],

            'tempat_lahir' => [
                'required',
                'string',
                'max:100'
            ],

            'tanggal_lahir' => [
                'required',
                'date'
            ],

            'jenis_kelamin' => [
                'required',
                'in:Laki-laki,Perempuan'
            ],

            'alamat' => [
                'required',
                'string'
            ],

            'no_hp' => [
                'required',
                'string',
                'max:20'
            ],

            'email' => [
                'nullable',
                'email',
                'max:255'
            ],

            'pendidikan_terakhir' => [
                'required',
                'string',
                'max:100'
            ],

            'program_pelatihan' => [
                'required',
                'string',
                'max:255'
            ],

        ]);


        $validated['status'] = 'Menunggu';


        Pendaftaran::create($validated);


        return redirect()
            ->route('pendaftaran.index')
            ->with(
                'success',
                'Pendaftaran berhasil dikirim. Silakan menunggu informasi selanjutnya dari BLK Kabupaten Indramayu.'
            );
    }
}