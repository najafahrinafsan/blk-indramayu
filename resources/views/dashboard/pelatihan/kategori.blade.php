@extends('layouts.app')

@section('title', 'Kategori Pelatihan')

@section('content')

@include('dashboard.navbar')

<style>
    .category-hero {
        position: relative;
        overflow: hidden;
        background:
            linear-gradient(135deg, rgba(13, 110, 253, .98), rgba(8, 72, 160, .95));
        padding: 90px 0 85px;
    }

    .category-hero::before {
        content: "";
        position: absolute;
        width: 380px;
        height: 380px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .08);
        top: -180px;
        right: -100px;
    }

    .category-hero::after {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .06);
        bottom: -150px;
        left: -80px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 850px;
        margin: auto;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border-radius: 50px;
        background: rgba(255, 255, 255, .15);
        border: 1px solid rgba(255, 255, 255, .25);
        font-size: .85rem;
        font-weight: 600;
        letter-spacing: .5px;
        margin-bottom: 20px;
    }

    .hero-title {
        font-size: clamp(2.2rem, 5vw, 3.5rem);
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 18px;
    }

    .hero-description {
        font-size: 1.08rem;
        line-height: 1.8;
        opacity: .92;
        margin-bottom: 0;
    }

    .training-section {
        background: #f8fafc;
        padding: 80px 0;
    }

    .section-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
        background: rgba(13, 110, 253, .1);
        color: #0d6efd;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .section-title {
        font-size: clamp(1.8rem, 4vw, 2.5rem);
        font-weight: 800;
        color: #16213e;
        margin-top: 18px;
        margin-bottom: 15px;
    }

    .training-intro {
        max-width: 720px;
        line-height: 1.8;
        font-size: 1rem;
    }

    .training-card {
        position: relative;
        overflow: hidden;
        border-radius: 20px !important;
        background: #fff;
        transition: all .3s ease;
    }

    .training-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(15, 23, 42, .12) !important;
    }

    .training-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: #e9eef5;
    }

    .training-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .training-card:hover .training-image {
        transform: scale(1.06);
    }

    .training-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0, 0, 0, .45),
            transparent 55%
        );
    }

    .training-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            linear-gradient(135deg, #e9f2ff, #f5f8fc);
        color: #0d6efd;
        font-size: 3.5rem;
    }

    .training-status {
        position: absolute;
        top: 16px;
        right: 16px;
        z-index: 2;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 50px;
        background: rgba(25, 135, 84, .95);
        color: #fff;
        font-size: .75rem;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .12);
    }

    .training-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        font-size: 1.3rem;
        margin-top: -42px;
        position: relative;
        z-index: 3;
        box-shadow: 0 8px 20px rgba(13, 110, 253, .25);
    }

    .training-name {
        color: #16213e;
        font-size: 1.25rem;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .training-description {
        color: #64748b !important;
        line-height: 1.7;
        font-size: .92rem;
        min-height: 75px;
    }

    .training-button {
        border-radius: 12px;
        padding: 11px 18px;
        font-weight: 600;
        transition: all .25s ease;
    }

    .training-button:hover {
        transform: translateX(3px);
    }

    .empty-state {
        padding: 70px 20px;
        background: #fff;
        border-radius: 20px;
    }

    .empty-icon {
        width: 85px;
        height: 85px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eef5ff;
        color: #0d6efd;
        font-size: 2.4rem;
    }

    .info-section {
        padding: 80px 0;
        background: #fff;
    }

    .info-box {
        position: relative;
        overflow: hidden;
        max-width: 900px;
        margin: auto;
        padding: 50px 35px;
        border-radius: 25px;
        background: linear-gradient(
            135deg,
            #f0f6ff,
            #f8fbff
        );
        border: 1px solid rgba(13, 110, 253, .08);
    }

    .info-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border-radius: 20px;
        background: rgba(13, 110, 253, .1);
        color: #0d6efd;
        font-size: 2rem;
    }

    .info-title {
        color: #16213e;
        font-weight: 800;
    }

    .info-text {
        max-width: 680px;
        line-height: 1.8;
    }

    @media (max-width: 767.98px) {
        .category-hero {
            padding: 65px 0;
        }

        .hero-description {
            font-size: .98rem;
        }

        .training-section,
        .info-section {
            padding: 60px 0;
        }

        .training-image-wrapper {
            height: 200px;
        }

        .training-description {
            min-height: auto;
        }

        .info-box {
            padding: 40px 22px;
        }
    }
</style>

{{-- =====================================================
     HERO
====================================================== --}}

<section class="category-hero text-white">
    <div class="container">
        <div class="hero-content text-center">
            <div class="hero-badge">
                <i class="bi bi-mortarboard-fill"></i>
                PROGRAM PELATIHAN BLK
            </div>

            <h1 class="hero-title">
                Kategori Pelatihan
            </h1>

            <p class="hero-description">
                Temukan berbagai pilihan program pelatihan dan kejuruan
                untuk meningkatkan keterampilan, kompetensi, dan kesiapan
                Anda memasuki dunia kerja.
            </p>
        </div>
    </div>
</section>


{{-- =====================================================
     PROGRAM PELATIHAN
====================================================== --}}

<section class="training-section">
    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">
            <span class="section-label">
                <i class="bi bi-grid-fill"></i>
                PROGRAM PELATIHAN
            </span>

            <h2 class="section-title">
                Jenis Program dan Kejuruan
            </h2>

            <p class="text-muted mx-auto training-intro mb-0">
                BLK Kabupaten Indramayu menyediakan berbagai program
                pelatihan untuk membantu masyarakat meningkatkan
                keterampilan, kompetensi, dan kesiapan menghadapi
                dunia kerja maupun mengembangkan usaha.
            </p>
        </div>


        {{-- DAFTAR KATEGORI --}}
        <div class="row g-4">
            @forelse($kategoris as $kategori)

                <div class="col-md-6 col-lg-4">
                    <div class="card training-card border-0 shadow-sm h-100">

                        {{-- GAMBAR --}}
                        <div class="training-image-wrapper">
                            @if($kategori->gambar)
                                <img
                                    src="{{ asset('assets/image/kategori/' . $kategori->gambar) }}"
                                    class="training-image"
                                    alt="{{ $kategori->nama }}"
                                    loading="lazy"
                                >

                                <div class="training-image-overlay"></div>
                            @else
                                <div class="training-image-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif

                            {{-- STATUS --}}
                            <div class="training-status">
                                <i class="bi bi-check-circle-fill"></i>
                                Program Aktif
                            </div>
                        </div>


                        {{-- ISI CARD --}}
                        <div class="card-body p-4 d-flex flex-column">

                            {{-- ICON --}}
                            <div class="training-icon bg-primary text-white">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>


                            {{-- NAMA --}}
                            <h3 class="training-name fw-bold mt-3">
                                {{ $kategori->nama }}
                            </h3>


                            {{-- SUMBER ANGGARAN --}}
                            <div class="mb-3">
                                @if($kategori->sumber_anggaran === 'APBN')
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-building me-1"></i>
                                        Anggaran APBN
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        <i class="bi bi-building me-1"></i>
                                        Anggaran APBD
                                    </span>
                                @endif
                            </div>


                            {{-- DESKRIPSI --}}
                            <p class="training-description mb-4">
                                {{ $kategori->deskripsi ?: 'Program pelatihan untuk meningkatkan keterampilan dan kompetensi peserta.' }}
                            </p>


                            {{-- BUTTON --}}
                            <a
                                href="{{ route('pelatihan.detail', $kategori->id) }}"
                                class="btn btn-primary training-button mt-auto"
                            >
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>
                    </div>
                </div>

            @empty

                {{-- EMPTY STATE --}}
                <div class="col-12">
                    <div class="empty-state text-center shadow-sm">
                        <div class="empty-icon">
                            <i class="bi bi-folder-x"></i>
                        </div>

                        <h4 class="fw-bold text-dark">
                            Belum Ada Program Pelatihan
                        </h4>

                        <p class="text-muted mb-0">
                            Program pelatihan yang tersedia akan
                            ditampilkan di halaman ini.
                        </p>
                    </div>
                </div>

            @endforelse
        </div>

    </div>
</section>


{{-- =====================================================
     INFORMASI
====================================================== --}}

<section class="info-section">
    <div class="container">
        <div class="info-box text-center shadow-sm">

            <div class="info-icon">
                <i class="bi bi-lightbulb-fill"></i>
            </div>

            <h3 class="info-title mb-3">
                Temukan Pelatihan yang Sesuai
            </h3>

            <p class="text-muted info-text mx-auto mb-0">
                Pilih program pelatihan sesuai dengan minat,
                keterampilan, dan kebutuhan Anda. Informasi program
                akan diperbarui sesuai dengan pelatihan yang tersedia
                di BLK Kabupaten Indramayu.
            </p>

        </div>
    </div>
</section>


@include('dashboard.footer')