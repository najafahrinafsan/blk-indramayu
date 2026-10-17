<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - INDEX
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan semua galeri untuk admin.
     */
    public function index()
    {
        $galeris = Galeri::latest()
            ->paginate(12);

        return view(
            'admin.galeri.index',
            compact('galeris')
        );
    }


    public function showPublic($id)
{
    $galeri = Galeri::findOrFail($id);

    return view('dashboard.informasi.galeri-detail', compact('galeri'));
}

    /*
    |--------------------------------------------------------------------------
    | PUBLIK - INDEX
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan semua galeri pada halaman publik.
     */
    public function publicIndex()
    {
        $galeris = Galeri::latest()
            ->get();

        return view(
            'dashboard.informasi.galeri',
            compact('galeris')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - CREATE
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan form tambah galeri.
     */
    public function create()
    {
        return view(
            'admin.galeri.create'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - STORE
    |--------------------------------------------------------------------------
    */

    /**
     * Menyimpan galeri baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',

            'deskripsi' => 'nullable|string',

            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [

            'judul.required' =>
                'Judul galeri wajib diisi.',

            'judul.max' =>
                'Judul galeri maksimal 255 karakter.',

            'gambar.required' =>
                'Gambar galeri wajib dipilih.',

            'gambar.image' =>
                'File harus berupa gambar.',

            'gambar.mimes' =>
                'Format gambar harus JPG, JPEG, PNG, atau WEBP.',

            'gambar.max' =>
                'Ukuran gambar maksimal 2 MB.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $data = $request->only([
            'judul',
            'deskripsi',
        ]);


        /*
        |--------------------------------------------------------------------------
        | FOLDER GAMBAR
        |--------------------------------------------------------------------------
        */

        $folder = public_path(
            'assets/image/galeri'
        );


        /*
        |--------------------------------------------------------------------------
        | BUAT FOLDER JIKA BELUM ADA
        |--------------------------------------------------------------------------
        */

        if (!File::exists($folder)) {

            File::makeDirectory(
                $folder,
                0755,
                true
            );
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');

            $namaGambar =
                time()
                . '_'
                . uniqid()
                . '.'
                . $gambar->getClientOriginalExtension();


            $gambar->move(
                $folder,
                $namaGambar
            );


            $data['gambar'] = $namaGambar;
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        Galeri::create($data);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Galeri kegiatan berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - EDIT
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan form edit galeri.
     */
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view(
            'admin.galeri.edit',
            compact('galeri')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE
    |--------------------------------------------------------------------------
    */

    /**
     * Memperbarui galeri.
     */
    public function update(
        Request $request,
        $id
    ) {

        $galeri = Galeri::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'judul' => 'required|string|max:255',

            'deskripsi' => 'nullable|string',

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [

            'judul.required' =>
                'Judul galeri wajib diisi.',

            'judul.max' =>
                'Judul galeri maksimal 255 karakter.',

            'gambar.image' =>
                'File harus berupa gambar.',

            'gambar.mimes' =>
                'Format gambar harus JPG, JPEG, PNG, atau WEBP.',

            'gambar.max' =>
                'Ukuran gambar maksimal 2 MB.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $data = $request->only([
            'judul',
            'deskripsi',
        ]);


        

        /*
        |--------------------------------------------------------------------------
        | FOLDER GAMBAR
        |--------------------------------------------------------------------------
        */

        $folder = public_path(
            'assets/image/galeri'
        );


        if (!File::exists($folder)) {

            File::makeDirectory(
                $folder,
                0755,
                true
            );
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            /*
            | Hapus gambar lama
            */

            if (
                $galeri->gambar &&
                File::exists(
                    $folder . '/' . $galeri->gambar
                )
            ) {

                File::delete(
                    $folder . '/' . $galeri->gambar
                );
            }


            /*
            | Upload gambar baru
            */

            $gambar = $request->file('gambar');

            $namaGambar =
                time()
                . '_'
                . uniqid()
                . '.'
                . $gambar->getClientOriginalExtension();


            $gambar->move(
                $folder,
                $namaGambar
            );


            $data['gambar'] = $namaGambar;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $galeri->update($data);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Galeri kegiatan berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DESTROY
    |--------------------------------------------------------------------------
    */

    /**
     * Menghapus galeri.
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($galeri->gambar) {

            $path = public_path(
                'assets/image/galeri/'
                . $galeri->gambar
            );


            if (File::exists($path)) {

                File::delete($path);
            }
        }

        

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATABASE
        |--------------------------------------------------------------------------
        */

        $galeri->delete();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Galeri kegiatan berhasil dihapus.'
            );
    }
}