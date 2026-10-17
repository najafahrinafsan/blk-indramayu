<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengumumanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - DAFTAR PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pengumumans = Pengumuman::latest('tanggal')
            ->paginate(10);

        return view(
            'admin.pengumuman.index',
            compact('pengumumans')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - FORM TAMBAH
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.pengumuman.create');
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - SIMPAN PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate(
            [
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'tanggal' => 'required|date',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|in:Aktif,Nonaktif',
            ],
            [
                'judul.required' =>
                    'Judul pengumuman wajib diisi.',

                'judul.max' =>
                    'Judul pengumuman maksimal 255 karakter.',

                'isi.required' =>
                    'Isi pengumuman wajib diisi.',

                'tanggal.required' =>
                    'Tanggal pengumuman wajib diisi.',

                'tanggal.date' =>
                    'Format tanggal tidak valid.',

                'gambar.image' =>
                    'File yang dipilih harus berupa gambar.',

                'gambar.mimes' =>
                    'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',

                'gambar.max' =>
                    'Ukuran gambar maksimal 2 MB.',

                'status.required' =>
                    'Status pengumuman wajib dipilih.',

                'status.in' =>
                    'Status pengumuman tidak valid.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | NAMA GAMBAR
        |--------------------------------------------------------------------------
        */

        $namaGambar = null;


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path(
                'assets/image/pengumuman'
            );


            /*
            | Buat folder jika belum ada
            */

            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );
            }


            $file = $request->file('gambar');


            /*
            | Nama file dibuat unik
            */

            $namaGambar =
                time() . '_' .
                $file->getClientOriginalName();


            /*
            | Pindahkan gambar ke folder
            */

            $file->move(
                $folder,
                $namaGambar
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN KE DATABASE
        |--------------------------------------------------------------------------
        */

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $namaGambar,
            'status' => $request->status,
        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view(
            'admin.pengumuman.edit',
            compact('pengumuman')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate(
            [
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'tanggal' => 'required|date',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|in:Aktif,Nonaktif',
            ],
            [
                'judul.required' =>
                    'Judul pengumuman wajib diisi.',

                'judul.max' =>
                    'Judul pengumuman maksimal 255 karakter.',

                'isi.required' =>
                    'Isi pengumuman wajib diisi.',

                'tanggal.required' =>
                    'Tanggal pengumuman wajib diisi.',

                'tanggal.date' =>
                    'Format tanggal tidak valid.',

                'gambar.image' =>
                    'File yang dipilih harus berupa gambar.',

                'gambar.mimes' =>
                    'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',

                'gambar.max' =>
                    'Ukuran gambar maksimal 2 MB.',

                'status.required' =>
                    'Status pengumuman wajib dipilih.',

                'status.in' =>
                    'Status pengumuman tidak valid.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | CARI DATA
        |--------------------------------------------------------------------------
        */

        $pengumuman = Pengumuman::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | DATA YANG AKAN DIUPDATE
        |--------------------------------------------------------------------------
        */

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];


        /*
        |--------------------------------------------------------------------------
        | JIKA ADA GAMBAR BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path(
                'assets/image/pengumuman'
            );


            /*
            | Buat folder jika belum ada
            */

            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );
            }


            /*
            | Hapus gambar lama
            */

            if (
                $pengumuman->gambar &&
                File::exists(
                    $folder . '/' . $pengumuman->gambar
                )
            ) {

                File::delete(
                    $folder . '/' . $pengumuman->gambar
                );
            }


            /*
            | Upload gambar baru
            */

            $file = $request->file('gambar');

            $namaGambar =
                time() . '_' .
                $file->getClientOriginalName();


            $file->move(
                $folder,
                $namaGambar
            );


            /*
            | Simpan nama gambar baru
            */

            $data['gambar'] = $namaGambar;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $pengumuman->update($data);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - HAPUS PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($pengumuman->gambar) {

            $path = public_path(
                'assets/image/pengumuman/' .
                $pengumuman->gambar
            );

            if (File::exists($path)) {

                File::delete($path);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $pengumuman->delete();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil dihapus.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PUBLIC - DAFTAR PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    public function publicIndex()
    {
        $pengumumans = Pengumuman::where(
            'status',
            'Aktif'
        )
            ->latest('tanggal')
            ->paginate(6);


        return view(
            'dashboard.informasi.pengumuman',
            compact('pengumumans')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PUBLIC - DETAIL PENGUMUMAN
    |--------------------------------------------------------------------------
    */

    public function showPublic($id)
    {
        $pengumuman = Pengumuman::where(
            'status',
            'Aktif'
        )->findOrFail($id);


        return view(
            'dashboard.informasi.pengumuman-detail',
            compact('pengumuman')
        );
    }
}