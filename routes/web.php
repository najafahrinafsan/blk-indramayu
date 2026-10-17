<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\KategoriPelatihanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\Admin\SurveiKepekerjaanController;



/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('dashboard.index');
});




/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

Route::view('/profil', 'dashboard.tentang.profil');

Route::view('/tugas', 'dashboard.tentang.tugas');

Route::view('/struktur', 'dashboard.tentang.struktur');


/*
|--------------------------------------------------------------------------
| PELATIHAN
|--------------------------------------------------------------------------
*/

Route::get('/pelatihan', [
    KategoriPelatihanController::class,
    'publicIndex'
])->name('pelatihan');

Route::get('/kategori', [
    KategoriPelatihanController::class,
    'publicIndex'
])->name('kategori');


/*
|--------------------------------------------------------------------------
| HALAMAN PELATIHAN LAIN
|--------------------------------------------------------------------------
*/

Route::view(
    '/persyaratan',
    'dashboard.pelatihan.persyaratan'
);

Route::view(
    '/pelatihan/teknik-industri',
    'dashboard.pelatihan.teknik-industri'
);

Route::view(
    '/pelatihan/otomotif-pendingin',
    'dashboard.pelatihan.otomotif-pendingin'
);

Route::view(
    '/pelatihan/garmen-tata-busana',
    'dashboard.pelatihan.garmen-tata-busana'
);

Route::view(
    '/pelatihan/tata-rias-kecantikan',
    'dashboard.pelatihan.tata-rias-kecantikan'
);

Route::view(
    '/pelatihan/kuliner-tata-boga',
    'dashboard.pelatihan.kuliner-tata-boga'
);

Route::view(
    '/pelatihan/khusus-luar-negeri',
    'dashboard.pelatihan.khusus-luar-negeri'
);

Route::view(
    '/pelatihan/bisnis-teknologi',
    'dashboard.pelatihan.bisnis-teknologi'
);


/*
|--------------------------------------------------------------------------
| DETAIL PELATIHAN DINAMIS
|--------------------------------------------------------------------------
|
| Contoh:
| /pelatihan/4
|
| Method yang digunakan adalah publicShow(),
| bukan show().
|
*/

Route::get('/pelatihan/{id}', [
    KategoriPelatihanController::class,
    'publicShow'
])->name('pelatihan.detail');


/*
|--------------------------------------------------------------------------
| INFORMASI
|--------------------------------------------------------------------------
*/
Route::get('/galeri', [
    GaleriController::class,
    'publicIndex'
])->name('galeri');

Route::get('/galeri/{id}', [
    GaleriController::class,
    'showPublic'
])->name('galeri.detail');

Route::get('/testimoni', [
    AlumniController::class,
    'publicIndex'
])->name('testimoni');


Route::get('/testimoni', [
    AlumniController::class,
    'publicIndex'
])->name('testimoni');


Route::get('/pengumuman', [
    PengumumanController::class,
    'publicIndex'
])->name('pengumuman');

Route::get('/pengumuman/{id}', [
    PengumumanController::class,
    'showPublic'
])->name('pengumuman.detail');


Route::get(
    '/survei-kepekerjaan',
    [SurveiKepekerjaanController::class, 'publicCreate']
)->name('survei.kepekerjaan');

Route::post(
    '/survei-kepekerjaan',
    [SurveiKepekerjaanController::class, 'store']
)->name('survei.kepekerjaan.store');

/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/

Route::view(
    '/kontak',
    'dashboard.kontak.index'
)->name('kontak');

Route::post('/kontak/kirim-pesan', [
    PesanController::class,
    'store'
])->name('kontak.kirim');


/*
|--------------------------------------------------------------------------
| PENDAFTARAN PUBLIK
|--------------------------------------------------------------------------
|
| GET  /pendaftaran/{id}
| Menampilkan form berdasarkan kategori.
|
| POST /pendaftaran/{id}
| Menyimpan pendaftaran berdasarkan kategori.
|
*/


/*
 * Halaman berhasil harus diletakkan sebelum
 * /pendaftaran/{id} agar "berhasil" tidak dianggap
 * sebagai ID kategori.
 */

Route::get('/pendaftaran/berhasil', function () {
    return view('dashboard.pendaftaran.success');
})->name('pendaftaran.success');


Route::get('/pendaftaran/{id}', [
    PendaftaranController::class,
    'create'
])->name('pendaftaran.create');


Route::post('/pendaftaran/{id}', [
    PendaftaranController::class,
    'store'
])->name('pendaftaran.store');



Route::get('/alumni', [
    AlumniController::class,
    'publicIndex'
])->name('alumni');

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/login',
    [AdminAuthController::class, 'showLogin']
)->name('admin.login');

Route::post(
    '/admin/login',
    [AdminAuthController::class, 'login']
)->name('admin.login.process');




/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [AdminAuthController::class, 'dashboard']
        )->name('dashboard');

        Route::post(
            '/logout',
            [AdminAuthController::class, 'logout']
        )->name('logout');


        /*
        |--------------------------------------------------------------------------
        | PENDAFTAR
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pendaftar',
            [PendaftaranController::class, 'index']
        )->name('pendaftar.index');

        Route::get('/pendaftar/download', [
            PendaftaranController::class,
            'download'
        ])->name('pendaftar.download');

        Route::get(
            '/pendaftar/{id}',
            [PendaftaranController::class, 'show']
        )->name('pendaftar.show');

        Route::put(
            '/pendaftar/{id}/status',
            [PendaftaranController::class, 'updateStatus']
        )->name('pendaftar.status');

        Route::delete(
            '/pendaftar/{id}',
            [PendaftaranController::class, 'destroy']
        )->name('pendaftar.destroy');


        /*
        |--------------------------------------------------------------------------
        | KATEGORI PELATIHAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/kategori',
            [KategoriPelatihanController::class, 'index']
        )->name('kategori.index');

        Route::get(
            '/kategori/create',
            [KategoriPelatihanController::class, 'create']
        )->name('kategori.create');

        Route::post(
            '/kategori',
            [KategoriPelatihanController::class, 'store']
        )->name('kategori.store');

        Route::get(
            '/kategori/{id}/edit',
            [KategoriPelatihanController::class, 'edit']
        )->name('kategori.edit');

        Route::put(
            '/kategori/{id}',
            [KategoriPelatihanController::class, 'update']
        )->name('kategori.update');

        Route::delete(
            '/kategori/{id}',
            [KategoriPelatihanController::class, 'destroy']
        )->name('kategori.destroy');


        /*
        |--------------------------------------------------------------------------
        | GALERI
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/galeri',
            [GaleriController::class, 'index']
        )->name('galeri.index');

        Route::get(
            '/galeri/create',
            [GaleriController::class, 'create']
        )->name('galeri.create');

        Route::post(
            '/galeri',
            [GaleriController::class, 'store']
        )->name('galeri.store');

        Route::get(
            '/galeri/{id}/edit',
            [GaleriController::class, 'edit']
        )->name('galeri.edit');

        Route::put(
            '/galeri/{id}',
            [GaleriController::class, 'update']
        )->name('galeri.update');

        Route::delete(
            '/galeri/{id}',
            [GaleriController::class, 'destroy']
        )->name('galeri.destroy');


                // Alumni
        Route::get('/alumni', [AlumniController::class, 'index'])
            ->name('alumni.index');

        Route::get('/alumni/create', [AlumniController::class, 'create'])
            ->name('alumni.create');

        Route::post('/alumni', [AlumniController::class, 'store'])
            ->name('alumni.store');

        Route::get('/alumni/{id}/edit', [AlumniController::class, 'edit'])
            ->name('alumni.edit');

        Route::put('/alumni/{id}', [AlumniController::class, 'update'])
            ->name('alumni.update');

        Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])
            ->name('alumni.destroy');

        
        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pengumuman',
            [PengumumanController::class, 'index']
        )->name('pengumuman.index');

        Route::get(
            '/pengumuman/create',
            [PengumumanController::class, 'create']
        )->name('pengumuman.create');

        Route::post(
            '/pengumuman',
            [PengumumanController::class, 'store']
        )->name('pengumuman.store');

        Route::get(
            '/pengumuman/{id}/edit',
            [PengumumanController::class, 'edit']
        )->name('pengumuman.edit');

        Route::put(
            '/pengumuman/{id}',
            [PengumumanController::class, 'update']
        )->name('pengumuman.update');

        Route::delete(
            '/pengumuman/{id}',
            [PengumumanController::class, 'destroy']
        )->name('pengumuman.destroy');

                /*
        |--------------------------------------------------------------------------
        | PESAN MASUK
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pesan',
            [PesanController::class, 'index']
        )->name('pesan.index');

        Route::get(
            '/pesan/{id}',
            [PesanController::class, 'show']
        )->name('pesan.show');

        Route::put(
            '/pesan/{id}/status',
            [PesanController::class, 'updateStatus']
        )->name('pesan.status');

        Route::delete(
            '/pesan/{id}',
            [PesanController::class, 'destroy']
        )->name('pesan.destroy');
        


        Route::get(
            '/survei-kepekerjaan',
            [SurveiKepekerjaanController::class, 'index']
        )->name('survei.kepekerjaan.index');

        Route::get(
            '/survei-kepekerjaan/download',
            [SurveiKepekerjaanController::class, 'download']
        )->name('survei.kepekerjaan.download');

        Route::get(
            '/survei-kepekerjaan/{id}',
            [SurveiKepekerjaanController::class, 'show']
        )->name('survei.kepekerjaan.show');

        Route::get(
            '/survei-kepekerjaan/{id}/edit',
            [SurveiKepekerjaanController::class, 'edit']
        )->name('survei.kepekerjaan.edit');

        Route::put(
            '/survei-kepekerjaan/{id}',
            [SurveiKepekerjaanController::class, 'update']
        )->name('survei.kepekerjaan.update');

        Route::delete(
            '/survei-kepekerjaan/{id}',
            [SurveiKepekerjaanController::class, 'destroy']
        )->name('survei.kepekerjaan.destroy');



    });