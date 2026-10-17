<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\KategoriPelatihan;
use Illuminate\Http\Request;
use App\Exports\PendaftarExport;
use Maatwebsite\Excel\Facades\Excel;


class PendaftaranController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM PENDAFTARAN - PUBLIK
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan form pendaftaran
     * berdasarkan kategori pelatihan.
     */
    public function create($id)
    {
        $kategori = KategoriPelatihan::where(
            'status',
            'Aktif'
        )->findOrFail($id);

        return view(
            'dashboard.pendaftaran',
            compact('kategori')
        );
    }

    public function download()
        {
            return Excel::download(
                new PendaftarExport,
                'data-pendaftar-' . date('d-m-Y') . '.xlsx'
            );
        }
    /*
    |--------------------------------------------------------------------------
    | SIMPAN PENDAFTARAN - PUBLIK
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $id)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'nama_lengkap' => [
                'required',
                'string',
                'max:255'
            ],

            'nik' => [
                'required',
                'string',
                'size:16'
            ],

            'tempat_lahir' => [
                'required',
                'string',
                'max:255'
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
                'max:255'
            ],
        ], [

            'nama_lengkap.required' =>
                'Nama lengkap wajib diisi.',

            'nik.required' =>
                'NIK wajib diisi.',

            'nik.size' =>
                'NIK harus terdiri dari 16 digit.',

            'tempat_lahir.required' =>
                'Tempat lahir wajib diisi.',

            'tanggal_lahir.required' =>
                'Tanggal lahir wajib diisi.',

            'jenis_kelamin.required' =>
                'Jenis kelamin wajib dipilih.',

            'alamat.required' =>
                'Alamat wajib diisi.',

            'no_hp.required' =>
                'Nomor HP wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'pendidikan_terakhir.required' =>
                'Pendidikan terakhir wajib diisi.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | CARI KATEGORI
        |--------------------------------------------------------------------------
        |
        | ID kategori diambil langsung dari URL:
        |
        | /pendaftaran/5
        |
        */

        $kategori = KategoriPelatihan::where(
            'status',
            'Aktif'
        )->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA PENDAFTAR
        |--------------------------------------------------------------------------
        */

        Pendaftaran::create([

            'nama_lengkap' =>
                $request->nama_lengkap,

            'nik' =>
                $request->nik,

            'tempat_lahir' =>
                $request->tempat_lahir,

            'tanggal_lahir' =>
                $request->tanggal_lahir,

            'jenis_kelamin' =>
                $request->jenis_kelamin,

            'alamat' =>
                $request->alamat,

            'no_hp' =>
                $request->no_hp,

            'email' =>
                $request->email,

            'pendidikan_terakhir' =>
                $request->pendidikan_terakhir,

            /*
             * Nama program otomatis diambil
             * dari kategori.
             */
            'program_pelatihan' =>
                $kategori->nama,

            /*
             * Semua pendaftar baru
             * berstatus Menunggu.
             */
            'status' =>
                'Menunggu',
        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT KE HALAMAN BERHASIL
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('pendaftaran.success')
            ->with(
                'success',
                'Pendaftaran Anda sudah dilakukan. Data pendaftaran telah kami terima. Anda akan kami hubungi untuk informasi selanjutnya.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DAFTAR PENDAFTAR
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Pendaftaran::query();


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'nama_lengkap',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'nik',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'program_pelatihan',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'no_hp',
                    'like',
                    '%' . $search . '%'
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $pendaftarans = $query
            ->latest()
            ->paginate(10);


        return view(
            'admin.pendaftar.index',
            compact('pendaftarans')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DETAIL PENDAFTAR
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $pendaftaran =
            Pendaftaran::findOrFail($id);

        return view(
            'admin.pendaftar.show',
            compact('pendaftaran')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    public function updateStatus(
        Request $request,
        $id
    ) {

        $request->validate([
            'status' => [
                'required',
                'in:Menunggu,Diterima,Ditolak'
            ],
        ]);


        $pendaftaran =
            Pendaftaran::findOrFail($id);


        $pendaftaran->update([
            'status' =>
                $request->status,
        ]);


        return redirect()
            ->route('admin.pendaftar.index')
            ->with(
                'success',
                'Status pendaftar berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $pendaftaran =
            Pendaftaran::findOrFail($id);


        $pendaftaran->delete();


        return redirect()
            ->route('admin.pendaftar.index')
            ->with(
                'success',
                'Data pendaftar berhasil dihapus.'
            );
    }
}