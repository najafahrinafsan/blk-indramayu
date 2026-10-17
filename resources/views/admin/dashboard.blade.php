@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<!-- ================================
     NAVBAR
================================ -->

<nav class="navbar navbar-dark bg-primary shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">

            <i class="bi bi-speedometer2 me-2"></i>

            Admin BLK Kabupaten Indramayu

        </a>

        <form action="{{ route('admin.logout') }}" method="POST">

            @csrf

            <button type="submit"
                    class="btn btn-warning fw-bold px-3">

                <i class="bi bi-box-arrow-right me-1"></i>

                Logout

            </button>

        </form>

    </div>

</nav>


<!-- ================================
     DASHBOARD
================================ -->

<div class="container py-5">


    <!-- HEADER -->

    <div class="mb-5">

        <h1 class="fw-bold text-primary mb-2">

            Dashboard Administrator

        </h1>

        <p class="text-muted mb-0">

            Selamat datang,

            <strong>{{ session('admin_name') }}</strong>.

            Anda login sebagai Administrator.

        </p>

    </div>



    <!-- ================================
         MENU ADMIN
    ================================= -->

    <div class="row g-4">


        <!-- PENDAFTAR -->

        <div class="col-md-6 col-lg-3">

            <div class="card admin-card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="admin-icon bg-primary bg-opacity-10 text-primary">

                        <i class="bi bi-people-fill"></i>

                    </div>

                    <h5 class="fw-bold mt-4 mb-2">

                        Pendaftar

                    </h5>

                    <p class="text-muted">

                        Melihat data peserta yang mendaftar.

                    </p>

                    <a href="{{ route('admin.pendaftar.index') }}"
                       class="btn btn-primary w-100 mt-2">

                        <i class="bi bi-arrow-right-circle me-1"></i>

                        Kelola

                    </a>

                </div>

            </div>

        </div>



        <!-- KATEGORI PELATIHAN -->

        <div class="col-md-6 col-lg-3">

            <div class="card admin-card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="admin-icon bg-success bg-opacity-10 text-success">

                        <i class="bi bi-book-fill"></i>

                    </div>

                    <h5 class="fw-bold mt-4 mb-2">

                        Kategori Pelatihan

                    </h5>

                    <p class="text-muted">

                        Tambah, edit dan hapus pelatihan.

                    </p>

                    <a href="{{ route('admin.kategori.index') }}"
                       class="btn btn-success w-100 mt-2">

                        <i class="bi bi-arrow-right-circle me-1"></i>

                        Kelola

                    </a>

                </div>

            </div>

        </div>



        <!-- GALERI -->

        <div class="col-md-6 col-lg-3">

            <div class="card admin-card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="admin-icon bg-warning bg-opacity-10 text-warning">

                        <i class="bi bi-images"></i>

                    </div>

                    <h5 class="fw-bold mt-4 mb-2">

                        Galeri

                    </h5>

                    <p class="text-muted">

                        Kelola galeri kegiatan BLK.

                    </p>

                    <a href="{{ route('admin.galeri.index') }}"
                       class="btn btn-warning w-100 mt-2">

                        <i class="bi bi-arrow-right-circle me-1"></i>

                        Kelola

                    </a>

                </div>

            </div>

        </div>



        <!-- PENGUMUMAN -->

        <div class="col-md-6 col-lg-3">

            <div class="card admin-card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="admin-icon bg-danger bg-opacity-10 text-danger">

                        <i class="bi bi-megaphone-fill"></i>

                    </div>

                    <h5 class="fw-bold mt-4 mb-2">

                        Pengumuman

                    </h5>

                    <p class="text-muted">

                        Kelola informasi dan pengumuman.

                    </p>

                    <a href="{{ route('admin.pengumuman.index') }}"
                       class="btn btn-danger w-100 mt-2">

                        <i class="bi bi-arrow-right-circle me-1"></i>

                        Kelola

                    </a>

                </div>

            </div>


        </div>

        {{-- PESAN MASUK --}}
<div class="col-md-6 col-lg-3">
    <div class="card admin-card border-0 shadow-sm h-100">

        <div class="card-body p-4">

            <div class="admin-icon bg-info bg-opacity-10 text-info">
                <i class="bi bi-envelope-fill"></i>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <h5 class="fw-bold mb-0">
                    Pesan Masuk
                </h5>

                @if($jumlahPesan > 0)
                    <span class="badge bg-danger rounded-pill">
                        {{ $jumlahPesan }}
                    </span>
                @endif
            </div>

            <p class="text-muted">
                Melihat pesan yang dikirim oleh pengunjung website.
            </p>

            <a
                href="{{ route('admin.pesan.index') }}"
                class="btn btn-info text-white w-100 mt-2"
            >
                <i class="bi bi-envelope-open me-1"></i>
                Lihat Pesan
            </a>

        </div>

    </div>
</div>


<div class="col-md-6 col-lg-3">
    <div class="card admin-card border-0 shadow-sm h-100">

        <div class="card-body p-4">

            <div class="admin-icon bg-success bg-opacity-10 text-success">
                <i class="bi bi-people-fill"></i>
            </div>

            <h5 class="fw-bold mt-4 mb-2">
                Alumni
            </h5>

            <p class="text-muted">
                Mengelola data alumni, foto, judul, dan deskripsi alumni.
            </p>

            <a
                href="{{ route('admin.alumni.index') }}"
                class="btn btn-success w-100 mt-2"
            >
                <i class="bi bi-people-fill me-1"></i>
                Kelola Alumni
            </a>

        </div>

    </div>
</div>


{{-- SURVEI KEPEKERJAAN --}}
<div class="col-md-6 col-lg-3">

    <div class="card admin-card border-0 shadow-sm h-100">

        <div class="card-body p-4">

            <div class="admin-icon bg-primary bg-opacity-10 text-primary">
                <i class="bi bi-briefcase-fill"></i>
            </div>

            <h5 class="fw-bold mt-4 mb-2">
                Survei Kepekerjaan
            </h5>

            <p class="text-muted">
                Melihat dan mengelola data survei kepekerjaan alumni.
            </p>

            <a
                href="{{ route('admin.survei.kepekerjaan.index') }}"
                class="btn btn-primary w-100 mt-2"
            >
                <i class="bi bi-bar-chart-fill me-1"></i>
                Kelola Survei
            </a>

        </div>

    </div>

</div>

    </div>

</div>



<!-- ================================
     CSS UI
================================ -->

<style>

    /* Background halaman */

    body {
        background-color: #f5f7fb;
    }


    /* Navbar */

    .navbar {
        min-height: 65px;
    }

    .navbar-brand {
        font-size: 18px;
    }


    /* Header */

    .container.py-5 > .mb-5 h1 {
        font-size: 32px;
    }


    /* Card */

    .admin-card {

        border-radius: 16px;

        background: #ffffff;

        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease;

    }


    /* Efek hover */

    .admin-card:hover {

        transform: translateY(-5px);

        box-shadow:
            0 10px 25px rgba(0, 0, 0, 0.10) !important;

    }


    /* Icon */

    .admin-icon {

        width: 58px;

        height: 58px;

        border-radius: 14px;

        display: flex;

        align-items: center;

        justify-content: center;

    }


    .admin-icon i {

        font-size: 27px;

    }


    /* Judul */

    .admin-card h5 {

        font-size: 18px;

        min-height: 43px;

    }


    /* Deskripsi */

    .admin-card p {

        font-size: 14px;

        line-height: 1.7;

        min-height: 48px;

        margin-bottom: 15px;

    }


    /* Tombol */

    .admin-card .btn {

        border-radius: 9px;

        padding: 9px 15px;

        font-weight: 600;

    }


    /* ================================
       RESPONSIVE HP
    ================================= */

    @media (max-width: 767px) {

        .navbar-brand {

            font-size: 15px;

        }


        .navbar-brand i {

            margin-right: 5px !important;

        }


        .navbar .btn {

            font-size: 13px;

            padding: 7px 12px;

        }


        .container.py-5 {

            padding-top: 35px !important;

            padding-bottom: 35px !important;

        }


        .container.py-5 > .mb-5 {

            margin-bottom: 30px !important;

        }


        .container.py-5 > .mb-5 h1 {

            font-size: 25px;

        }


        .container.py-5 > .mb-5 p {

            font-size: 14px;

            line-height: 1.6;

        }


        .admin-card .card-body {

            padding: 22px !important;

        }


        .admin-icon {

            width: 52px;

            height: 52px;

        }


        .admin-icon i {

            font-size: 24px;

        }


        .admin-card h5 {

            font-size: 17px;

        }


        .admin-card p {

            min-height: auto;

        }

    }


    /* ================================
       HP KECIL
    ================================= */

    @media (max-width: 400px) {

        .navbar-brand {

            font-size: 14px;

        }


        .navbar-brand i {

            display: none;

        }


        .container.py-5 > .mb-5 h1 {

            font-size: 23px;

        }


        .admin-card .card-body {

            padding: 20px !important;

        }

    }

</style>

@endsection