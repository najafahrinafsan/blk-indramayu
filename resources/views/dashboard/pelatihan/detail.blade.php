@extends('layouts.app')

@section('title', $kategori->nama)

@section('content')

@include('dashboard.navbar')

<style>
    .detail-hero {
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at 10% 20%, rgba(255,255,255,.18), transparent 30%),
            radial-gradient(circle at 90% 80%, rgba(255,255,255,.12), transparent 30%),
            linear-gradient(135deg, #0d6efd 0%, #0a58ca 55%, #084298 100%);
    }

    .detail-hero::before,
    .detail-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,.07);
    }

    .detail-hero::before {
        width: 280px;
        height: 280px;
        top: -150px;
        right: 5%;
    }

    .detail-hero::after {
        width: 220px;
        height: 220px;
        bottom: -130px;
        left: 8%;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 15px;
        border: 1px solid rgba(255,255,255,.25);
        background: rgba(255,255,255,.12);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        font-size: .85rem;
        font-weight: 600;
    }

    .program-card {
        border: 0;
        border-radius: 28px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 20px 60px rgba(15, 23, 42, .10);
    }

    .image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        background: #f1f5f9;
    }

    .program-image {
        width: 100%;
        height: 430px;
        object-fit: cover;
        display: block;
        transition: transform .5s ease;
    }

    .image-wrapper:hover .program-image {
        transform: scale(1.04);
    }

    .image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,.35),
            transparent 45%
        );
        pointer-events: none;
    }

    .image-label {
        position: absolute;
        left: 20px;
        bottom: 20px;
        background: rgba(255,255,255,.95);
        color: #0d6efd;
        padding: 9px 15px;
        border-radius: 50px;
        font-size: .85rem;
        font-weight: 700;
        box-shadow: 0 8px 25px rgba(0,0,0,.12);
    }

    .placeholder-image {
        height: 430px;
        border-radius: 24px;
        background: linear-gradient(135deg, #f8fafc, #e9ecef);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .placeholder-image i {
        font-size: 5rem;
        color: #adb5bd;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #e8f7ee;
        color: #198754;
        border: 1px solid #c7ecd5;
        padding: 8px 14px;
        border-radius: 50px;
        font-size: .85rem;
        font-weight: 700;
    }

    .program-title {
        font-size: clamp(1.8rem, 3vw, 2.7rem);
        line-height: 1.2;
        font-weight: 800;
        color: #0f172a;
    }

    .description-box {
        background: #f8fafc;
        border: 1px solid #e9ecef;
        border-radius: 18px;
        padding: 22px;
    }

    .description-box p {
        line-height: 1.8;
        margin-bottom: 0;
        color: #64748b;
    }

    .info-box {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        padding: 18px;
        border-radius: 18px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
    }

    .info-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #dbeafe;
        color: #0d6efd;
        font-size: 1.2rem;
    }

    .info-box h6 {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 4px;
    }

    .info-box p {
        margin: 0;
        color: #64748b;
        font-size: .92rem;
        line-height: 1.6;
    }

    .btn-register {
        border-radius: 14px;
        padding: 13px 22px;
        font-weight: 700;
        box-shadow: 0 10px 25px rgba(13, 110, 253, .20);
        transition: all .25s ease;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(13, 110, 253, .28);
    }

    .btn-back {
        border-radius: 14px;
        padding: 13px 20px;
        font-weight: 600;
    }

    .benefit-card {
        height: 100%;
        padding: 25px;
        border-radius: 20px;
        background: #fff;
        border: 1px solid #edf0f4;
        box-shadow: 0 10px 35px rgba(15, 23, 42, .06);
        transition: all .25s ease;
    }

    .benefit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(15, 23, 42, .10);
    }

    .benefit-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: #eaf2ff;
        color: #0d6efd;
        font-size: 1.35rem;
        margin-bottom: 18px;
    }

    .benefit-card h5 {
        font-weight: 750;
        color: #1e293b;
        margin-bottom: 8px;
    }

    .benefit-card p {
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 0;
        font-size: .94rem;
    }

    .section-label {
        color: #0d6efd;
        font-size: .8rem;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .bottom-cta {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        background: linear-gradient(135deg, #0d6efd, #084298);
        color: white;
        padding: 45px;
    }

    .bottom-cta::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border-radius: 50%;
        background: rgba(255,255,255,.07);
        right: -70px;
        top: -100px;
    }

    .bottom-cta-content {
        position: relative;
        z-index: 2;
    }

    @media (max-width: 991.98px) {
        .program-image,
        .placeholder-image {
            height: 350px;
        }
    }

    @media (max-width: 575.98px) {
        .program-image,
        .placeholder-image {
            height: 280px;
        }

        .program-card {
            border-radius: 20px;
        }

        .image-wrapper,
        .placeholder-image {
            border-radius: 18px;
        }

        .bottom-cta {
            padding: 30px 22px;
            border-radius: 22px;
        }

        .btn-register,
        .btn-back {
            width: 100%;
        }
    }
</style>


{{-- =========================================================
     HERO
========================================================= --}}
<section class="detail-hero text-white py-5">
    <div class="container py-lg-4">
        <div class="hero-content text-center">

            <div class="hero-badge mb-3">
                <i class="bi bi-mortarboard-fill"></i>
                PROGRAM PELATIHAN
            </div>

            <h1 class="display-5 fw-bold mb-3">
                {{ $kategori->nama }}
            </h1>

            <p class="lead mb-0 opacity-75">
                Informasi lengkap program pelatihan BLK Kabupaten Indramayu
            </p>

        </div>
    </div>
</section>


{{-- =========================================================
     DETAIL PROGRAM
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container py-lg-3">

        <div class="program-card p-3 p-lg-4">

            <div class="row g-4 g-lg-5 align-items-center">

                {{-- GAMBAR --}}
                <div class="col-lg-6">

                    @if($kategori->gambar)

                        <div class="image-wrapper">

                            <img
                                src="{{ asset('assets/image/kategori/' . $kategori->gambar) }}"
                                alt="{{ $kategori->nama }}"
                                class="program-image"
                            >

                            <div class="image-overlay"></div>

                            <div class="image-label">
                                <i class="bi bi-image me-1"></i>
                                Program Pelatihan
                            </div>

                        </div>

                    @else

                        <div class="placeholder-image">

                            <div class="text-center">

                                <i class="bi bi-image"></i>

                                <p class="text-muted mb-0 mt-2">
                                    Gambar program belum tersedia
                                </p>

                            </div>

                        </div>

                    @endif

                </div>


                {{-- INFORMASI --}}
                <div class="col-lg-6">

                    <div class="px-lg-2">

                        {{-- STATUS --}}
<div class="mb-3 d-flex flex-wrap gap-2 align-items-center">

    <span class="status-badge">
        <i class="bi bi-check-circle-fill"></i>
        Program Aktif
    </span>

    @if($kategori->sumber_anggaran === 'APBN')
        <span class="badge bg-warning text-dark px-3 py-2">
            <i class="bi bi-building me-1"></i>
            Anggaran APBN
        </span>
    @else
        <span class="badge bg-success px-3 py-2">
            <i class="bi bi-building me-1"></i>
            Anggaran APBD
        </span>
    @endif

</div>


                        {{-- JUDUL --}}
                        <h2 class="program-title mb-3">
                            {{ $kategori->nama }}
                        </h2>


                        {{-- DESKRIPSI --}}
                        <div class="description-box mb-4">

                            <div class="d-flex align-items-center gap-2 mb-2">

                                <i class="bi bi-info-circle-fill text-primary"></i>

                                <strong class="text-dark">
                                    Tentang Program
                                </strong>

                            </div>

                            <p>
                                {{ $kategori->deskripsi ?: 'Program pelatihan untuk meningkatkan keterampilan, kompetensi, dan kesiapan peserta memasuki dunia kerja.' }}
                            </p>

                        </div>


                        {{-- INFO --}}
                        <div class="info-box mb-4">

                            <div class="info-icon">
                                <i class="bi bi-lightbulb-fill"></i>
                            </div>

                            <div>
                                <h6>
                                    Siapkan diri Anda
                                </h6>

                                <p>
                                    Pastikan Anda telah membaca informasi
                                    program sebelum melakukan pendaftaran
                                    sebagai peserta pelatihan.
                                </p>
                            </div>

                        </div>



                        {{-- BUTTON --}}
<div class="d-flex gap-2 flex-wrap">

    @if($kategori->sumber_anggaran === 'APBN')

        <button
            type="button"
            class="btn btn-primary btn-register"
            data-bs-toggle="modal"
            data-bs-target="#modalKonfirmasiApbn"
        >
            <i class="bi bi-pencil-square me-2"></i>
            Daftar sebagai Peserta
        </button>

    @else

        <a
            href="{{ route('pendaftaran.create', $kategori->id) }}"
            class="btn btn-primary btn-register"
        >
            <i class="bi bi-pencil-square me-2"></i>
            Daftar sebagai Peserta
        </a>

    @endif

    <a
        href="{{ route('kategori') }}"
        class="btn btn-outline-secondary btn-back"
    >
        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>

</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     KEUNGGULAN
========================================================= --}}
<section class="py-5">

    <div class="container py-lg-3">

        <div class="text-center mb-5">

            <div class="section-label">
                Keunggulan Pelatihan
            </div>

            <h2 class="fw-bold mb-2">
                Bekal untuk Masa Depan
            </h2>

            <p class="text-muted mb-0">
                Pelatihan dirancang untuk membantu peserta meningkatkan
                keterampilan dan kesiapan kerja.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="benefit-card">

                    <div class="benefit-icon">
                        <i class="bi bi-tools"></i>
                    </div>

                    <h5>
                        Meningkatkan Keterampilan
                    </h5>

                    <p>
                        Mengembangkan keterampilan praktis yang dapat
                        mendukung kebutuhan peserta di dunia kerja.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="benefit-card">

                    <div class="benefit-icon">
                        <i class="bi bi-award-fill"></i>
                    </div>

                    <h5>
                        Meningkatkan Kompetensi
                    </h5>

                    <p>
                        Membantu peserta meningkatkan kompetensi melalui
                        proses pembelajaran dan pelatihan yang terarah.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="benefit-card">

                    <div class="benefit-icon">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>

                    <h5>
                        Persiapan Dunia Kerja
                    </h5>

                    <p>
                        Memberikan bekal keterampilan sebagai persiapan
                        untuk memasuki dunia kerja maupun berwirausaha.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CTA
========================================================= --}}
<section class="pb-5">

    <div class="container">

        <div class="bottom-cta">

            <div class="bottom-cta-content">

                <div class="row align-items-center g-4">

                    <div class="col-lg-8">

                        <div class="small text-uppercase fw-bold opacity-75 mb-2">
                            Siap mengikuti pelatihan?
                        </div>

                        <h2 class="fw-bold mb-2">
                            Daftarkan diri Anda sekarang
                        </h2>

                        <p class="mb-0 opacity-75">
                            Jadilah bagian dari peserta pelatihan
                            BLK Kabupaten Indramayu.
                        </p>

                    </div>


                    <div class="col-lg-4 text-lg-end">

    @if($kategori->sumber_anggaran === 'APBN')

        <button
            type="button"
            class="btn btn-light btn-lg rounded-3 px-4 fw-bold"
            data-bs-toggle="modal"
            data-bs-target="#modalKonfirmasiApbn"
        >
            <i class="bi bi-arrow-right-circle me-2"></i>
            Mulai Pendaftaran
        </button>

    @else

        <a
            href="{{ route('pendaftaran.create', $kategori->id) }}"
            class="btn btn-light btn-lg rounded-3 px-4 fw-bold"
        >
            <i class="bi bi-arrow-right-circle me-2"></i>
            Mulai Pendaftaran
        </a>

    @endif

</div>

                </div>

            </div>

        </div>

    </div>

</section>

@if($kategori->sumber_anggaran === 'APBN')

    <div
        class="modal fade"
        id="modalKonfirmasiApbn"
        tabindex="-1"
        aria-labelledby="modalKonfirmasiApbnLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <div class="modal-header bg-warning">
                    <h5
                        class="modal-title fw-bold"
                        id="modalKonfirmasiApbnLabel"
                    >
                        <i class="bi bi-info-circle-fill me-2"></i>
                        Informasi Pendaftaran APBN
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Tutup"
                    ></button>
                </div>

                <div class="modal-body p-4">
                    <p class="mb-3">
                        Program pelatihan ini menggunakan sumber anggaran
                        <strong>APBN</strong>.
                    </p>

                    <p class="mb-0">
                        Pendaftaran peserta dilakukan melalui akun resmi
                        <strong>Kemnaker</strong>.
                        Apakah Anda ingin melanjutkan ke halaman login
                        Kemnaker?
                    </p>
                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal"
                    >
                        Tidak
                    </button>

                    <a
                        href="https://account.kemnaker.go.id/auth/login"
                        class="btn btn-primary"
                    >
                        Ya, Lanjutkan
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                </div>

            </div>
        </div>
    </div>

@endif

@include('dashboard.footer')

@endsection