<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Menyimpan pesan dari halaman kontak.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.max' => 'Nomor HP maksimal 20 karakter.',
            'subjek.required' => 'Subjek wajib diisi.',
            'pesan.required' => 'Pesan wajib diisi.',
        ]);

        Pesan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'status' => 'Belum Dibaca',
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Pesan berhasil dikirim. Terima kasih telah menghubungi kami.'
            );
    }

    /**
     * Menampilkan semua pesan untuk admin.
     */
    public function index()
    {
        $pesans = Pesan::latest()->paginate(10);

        $jumlahBelumDibaca = Pesan::where(
            'status',
            'Belum Dibaca'
        )->count();

        return view(
            'admin.pesan.index',
            compact('pesans', 'jumlahBelumDibaca')
        );
    }

    /**
     * Menampilkan detail pesan.
     */
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);

        // Otomatis tandai sudah dibaca ketika dibuka.
        if ($pesan->status === 'Belum Dibaca') {
            $pesan->status = 'Sudah Dibaca';
            $pesan->save();
        }

        return view(
            'admin.pesan.show',
            compact('pesan')
        );
    }

    /**
     * Mengubah status pesan.
     */
    public function updateStatus(Request $request, $id)
    {
        $pesan = Pesan::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Belum Dibaca,Sudah Dibaca',
        ]);

        $pesan->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Status pesan berhasil diperbarui.'
            );
    }

    /**
     * Menghapus pesan.
     */
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);

        $pesan->delete();

        return redirect()
            ->route('admin.pesan.index')
            ->with(
                'success',
                'Pesan berhasil dihapus.'
            );
    }
}