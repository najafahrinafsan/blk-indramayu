<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlumniController extends Controller
{
    /**
     * Menampilkan alumni untuk pengunjung website
     */
    public function publicIndex()
{
    $alumnis = Alumni::latest()->paginate(12);

    return view(
        'dashboard.informasi.testimoni',
        compact('alumnis')
    );
}

    /**
     * Menampilkan daftar alumni di admin
     */
    public function index()
    {
        $alumnis = Alumni::latest()->paginate(10);

        return view(
            'admin.alumni.index',
            compact('alumnis')
        );
    }

    /**
     * Menampilkan form tambah alumni
     */
    public function create()
    {
        return view('admin.alumni.create');
    }

    /**
     * Menyimpan data alumni
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path('assets/image/alumni');

            // Buat folder jika belum ada
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $file = $request->file('gambar');

            $namaFile = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $data['gambar'] = $namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        Alumni::create($data);

        return redirect()
            ->route('admin.alumni.index')
            ->with(
                'success',
                'Data alumni berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan form edit alumni
     */
    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);

        return view(
            'admin.alumni.edit',
            compact('alumni')
        );
    }

    /**
     * Memperbarui data alumni
     */
    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        /*
        |--------------------------------------------------------------------------
        | GANTI GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path('assets/image/alumni');

            // Buat folder jika belum ada
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            // Hapus gambar lama
            if ($alumni->gambar) {

                $oldFile = $folder . '/' . $alumni->gambar;

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            // Upload gambar baru
            $file = $request->file('gambar');

            $namaFile = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $data['gambar'] = $namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $alumni->update($data);

        return redirect()
            ->route('admin.alumni.index')
            ->with(
                'success',
                'Data alumni berhasil diperbarui.'
            );
    }

    /**
     * Menghapus data alumni
     */
    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($alumni->gambar) {

            $file = public_path(
                'assets/image/alumni/' . $alumni->gambar
            );

            if (File::exists($file)) {
                File::delete($file);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $alumni->delete();

        return redirect()
            ->route('admin.alumni.index')
            ->with(
                'success',
                'Data alumni berhasil dihapus.'
            );
    }
}