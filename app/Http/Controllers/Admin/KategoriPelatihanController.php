<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KategoriPelatihanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - INDEX
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan semua kategori pelatihan untuk admin.
     *
     * Admin dapat melihat:
     * - Aktif
     * - Nonaktif
     */
    public function index()
    {
        $kategoris = KategoriPelatihan::latest()
            ->paginate(10);

        return view(
            'admin.kategori.index',
            compact('kategoris')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PUBLIK - INDEX
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan kategori pelatihan untuk pengunjung.
     *
     * Hanya kategori dengan status Aktif
     * yang ditampilkan.
     */
    public function publicIndex()
    {
        $kategoris = KategoriPelatihan::where(
                'status',
                'Aktif'
            )
            ->latest()
            ->get();

        return view(
            'dashboard.pelatihan.kategori',
            compact('kategoris')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PUBLIK - DETAIL
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan detail satu program pelatihan.
     *
     * Hanya program Aktif yang bisa dilihat
     * oleh masyarakat.
     */
    public function publicShow($id)
    {
        $kategori = KategoriPelatihan::where(
                'status',
                'Aktif'
            )
            ->findOrFail($id);

        return view(
            'dashboard.pelatihan.detail',
            compact('kategori')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - CREATE
    |--------------------------------------------------------------------------
    */

    /**
     * Form tambah kategori.
     */
    public function create()
    {
        return view(
            'admin.kategori.create'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - STORE
    |--------------------------------------------------------------------------
    */

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',

            'deskripsi' => 'nullable|string',

            'sumber_anggaran' => [
                'required',
                'in:APBD,APBN'
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'status' => [
                'required',
                'in:Aktif,Nonaktif'
            ],
        ], [
            'nama.required' =>
                'Nama pelatihan wajib diisi.',

            'nama.max' =>
                'Nama pelatihan maksimal 255 karakter.',

            'sumber_anggaran.required' =>
                'Sumber anggaran wajib dipilih.',

            'sumber_anggaran.in' =>
                'Sumber anggaran hanya boleh APBD atau APBN.',

            'gambar.image' =>
                'File harus berupa gambar.',

            'gambar.mimes' =>
                'Format gambar harus JPG, JPEG, PNG, atau WEBP.',

            'gambar.max' =>
                'Ukuran gambar maksimal 2 MB.',

            'status.required' =>
                'Status wajib dipilih.',

            'status.in' =>
                'Status hanya boleh Aktif atau Nonaktif.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $data = $request->only([
            'nama',
            'deskripsi',
            'sumber_anggaran',
            'status',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path(
                'assets/image/kategori'
            );

            // Buat folder jika belum ada
            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );
            }

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
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        KategoriPelatihan::create($data);

        return redirect()
            ->route('admin.kategori.index')
            ->with(
                'success',
                'Kategori pelatihan berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - EDIT
    |--------------------------------------------------------------------------
    */

    /**
     * Form edit kategori.
     */
    public function edit($id)
    {
        $kategori =
            KategoriPelatihan::findOrFail($id);

        return view(
            'admin.kategori.edit',
            compact('kategori')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE
    |--------------------------------------------------------------------------
    */

    /**
     * Memperbarui kategori.
     */
    public function update(
        Request $request,
        $id
    ) {
        $kategori =
            KategoriPelatihan::findOrFail($id);

        $request->validate([
            'nama' =>
                'required|string|max:255',

            'deskripsi' =>
                'nullable|string',

            'sumber_anggaran' => [
                'required',
                'in:APBD,APBN'
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'status' => [
                'required',
                'in:Aktif,Nonaktif'
            ],
        ], [
            'nama.required' =>
                'Nama pelatihan wajib diisi.',

            'nama.max' =>
                'Nama pelatihan maksimal 255 karakter.',

            'sumber_anggaran.required' =>
                'Sumber anggaran wajib dipilih.',

            'sumber_anggaran.in' =>
                'Sumber anggaran hanya boleh APBD atau APBN.',

            'gambar.image' =>
                'File harus berupa gambar.',

            'gambar.mimes' =>
                'Format gambar harus JPG, JPEG, PNG, atau WEBP.',

            'gambar.max' =>
                'Ukuran gambar maksimal 2 MB.',

            'status.required' =>
                'Status wajib dipilih.',

            'status.in' =>
                'Status hanya boleh Aktif atau Nonaktif.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $data = $request->only([
            'nama',
            'deskripsi',
            'sumber_anggaran',
            'status',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path(
                'assets/image/kategori'
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
            | HAPUS GAMBAR LAMA
            |--------------------------------------------------------------------------
            */

            if (
                $kategori->gambar &&
                File::exists(
                    $folder . '/' . $kategori->gambar
                )
            ) {

                File::delete(
                    $folder . '/' . $kategori->gambar
                );
            }


            /*
            |--------------------------------------------------------------------------
            | UPLOAD GAMBAR BARU
            |--------------------------------------------------------------------------
            */

            $gambar =
                $request->file('gambar');

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

            $data['gambar'] =
                $namaGambar;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $kategori->update($data);

        return redirect()
            ->route('admin.kategori.index')
            ->with(
                'success',
                'Kategori pelatihan berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DESTROY
    |--------------------------------------------------------------------------
    */

    /**
     * Menghapus kategori.
     */
    public function destroy($id)
    {
        $kategori =
            KategoriPelatihan::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($kategori->gambar) {

            $path = public_path(
                'assets/image/kategori/'
                . $kategori->gambar
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

        $kategori->delete();

        return redirect()
            ->route('admin.kategori.index')
            ->with(
                'success',
                'Kategori pelatihan berhasil dihapus.'
            );
    }
}