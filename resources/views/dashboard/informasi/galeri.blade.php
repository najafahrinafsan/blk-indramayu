@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')

@include('dashboard.navbar')

<style>
    /* =====================================================
       HERO GALERI
    ===================================================== */

    .gallery-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            #0d6efd 0%,
            #0b5ed7 55%,
            #084298 100%
        );
        padding: 80px 0;
        color: #fff;
    }

    .gallery-hero::before {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .07);
        top: -220px;
        right: -100px;
    }

    .gallery-hero::after {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .05);
        bottom: -180px;
        left: -80px;
    }

    .gallery-hero-content {
        position: relative;
        z-index: 2;
        max-width: 850px;
        margin: auto;
    }

    .gallery-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 17px;
        border-radius: 50px;
        background: rgba(255, 255, 255, .14);
        border: 1px solid rgba(255, 255, 255, .22);
        font-size: .8rem;
        font-weight: 600;
        letter-spacing: .8px;
        margin-bottom: 18px;
    }

    .gallery-hero-title {
        font-size: clamp(2.2rem, 5vw, 3.4rem);
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 18px;
    }

    .gallery-hero-description {
        max-width: 700px;
        margin: auto;
        font-size: 1.05rem;
        line-height: 1.8;
        opacity: .92;
    }


    /* =====================================================
       MAIN SECTION
    ===================================================== */

    .gallery-section {
        background: #f8fafc;
        padding: 75px 0 90px;
    }

    .gallery-section-header {
        margin-bottom: 45px;
    }

    .gallery-section-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
        background: rgba(13, 110, 253, .1);
        color: #0d6efd;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .8px;
    }

    .gallery-section-title {
        color: #16213e;
        font-size: clamp(1.8rem, 4vw, 2.5rem);
        font-weight: 800;
        margin-top: 17px;
        margin-bottom: 12px;
    }

    .gallery-section-text {
        max-width: 680px;
        margin: auto;
        color: #64748b;
        line-height: 1.8;
    }


    /* =====================================================
       GALLERY CARD
    ===================================================== */

    .gallery-card {
        height: 100%;
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .06);
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(15, 23, 42, .13);
    }


    /* =====================================================
       IMAGE
    ===================================================== */

    .gallery-image {
        position: relative;
        height: 260px;
        overflow: hidden;
        background: #e9eef5;
    }

    .gallery-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .gallery-card:hover .gallery-image img {
        transform: scale(1.08);
    }

    .gallery-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, .18),
            transparent 45%,
            rgba(0, 0, 0, .18)
        );
        pointer-events: none;
    }


    /* =====================================================
       BADGE FOTO
    ===================================================== */

    .gallery-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 13px;
        border-radius: 50px;
        background: rgba(15, 23, 42, .72);
        color: #fff;
        font-size: .73rem;
        font-weight: 600;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }


    /* =====================================================
       IMAGE NUMBER
    ===================================================== */

    .gallery-number {
        position: absolute;
        right: 15px;
        top: 15px;
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, .9);
        color: #0d6efd;
        font-size: .8rem;
        font-weight: 700;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .12);
    }


    /* =====================================================
       CARD CONTENT
    ===================================================== */

    .gallery-content {
        padding: 23px;
    }

    .gallery-title {
        color: #16213e;
        font-size: 1.18rem;
        line-height: 1.45;
        font-weight: 750;
        margin-bottom: 11px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-description {
        color: #64748b;
        font-size: .9rem;
        line-height: 1.7;
        min-height: 48px;
        margin-bottom: 21px;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }


    /* =====================================================
       DETAIL BUTTON
    ===================================================== */

    .btn-gallery-detail {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 11px 18px;
        border-radius: 12px;
        font-weight: 600;
        transition: all .25s ease;
    }

    .btn-gallery-detail i {
        transition: transform .25s ease;
    }

    .btn-gallery-detail:hover i {
        transform: translateX(4px);
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .empty-gallery {
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 22px;
        padding: 75px 25px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .05);
    }

    .empty-icon {
        width: 90px;
        height: 90px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eef5ff;
        color: #0d6efd;
        font-size: 2.5rem;
    }

    .empty-title {
        color: #16213e;
        font-weight: 800;
        margin-top: 22px;
    }

    .empty-text {
        max-width: 450px;
        margin: 10px auto 0;
        color: #64748b;
    }


    /* =====================================================
       PAGINATION
    ===================================================== */

    .gallery-pagination {
        margin-top: 50px;
    }

    .gallery-pagination .pagination {
        gap: 5px;
    }

    .gallery-pagination .page-link {
        border: 0;
        border-radius: 10px;
        min-width: 40px;
        text-align: center;
        color: #0d6efd;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .06);
    }

    .gallery-pagination .page-item.active .page-link {
        background: #0d6efd;
        color: #fff;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 767.98px) {

        .gallery-hero {
            padding: 60px 0;
        }

        .gallery-hero-description {
            font-size: .95rem;
        }

        .gallery-section {
            padding: 55px 0 70px;
        }

        .gallery-image {
            height: 230px;
        }

        .gallery-content {
            padding: 20px;
        }

        .gallery-description {
            min-height: auto;
        }

    }

    @media (max-width: 575.98px) {

        .gallery-hero-title {
            font-size: 2rem;
        }

        .gallery-section-title {
            font-size: 1.8rem;
        }

        .gallery-image {
            height: 220px;
        }

        .empty-gallery {
            padding: 60px 20px;
        }

    }
</style>


{{-- =====================================================
     HERO
====================================================== --}}
<section class="gallery-hero">

    <div class="container">

        <div class="gallery-hero-content text-center">

            <div class="gallery-hero-badge">
                <i class="bi bi-images"></i>
                DOKUMENTASI KEGIATAN
            </div>

            <h1 class="gallery-hero-title">
                Galeri Kegiatan
            </h1>

            <p class="gallery-hero-description">
                Lihat berbagai dokumentasi kegiatan, pelatihan,
                dan aktivitas Balai Latihan Kerja Kabupaten Indramayu.
            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     GALERI
====================================================== --}}
<section class="gallery-section">

    <div class="container">

        {{-- HEADER --}}
        <div class="gallery-section-header text-center">

            <span class="gallery-section-label">
                <i class="bi bi-camera-fill"></i>
                GALERI BLK
            </span>

            <h2 class="gallery-section-title">
                Dokumentasi Kegiatan
            </h2>

            <p class="gallery-section-text mb-0">
                Kumpulan foto kegiatan dan program yang dilaksanakan
                oleh Balai Latihan Kerja Kabupaten Indramayu.
            </p>

        </div>


        {{-- DAFTAR GALERI --}}
        @if(isset($galeris) && $galeris->count() > 0)

            <div class="row g-4">

                @foreach($galeris as $index => $galeri)

                    <div class="col-xl-4 col-lg-4 col-md-6">

                        <div class="gallery-card">

                            {{-- FOTO --}}
                            <div class="gallery-image">

                                <img
                                    src="{{ asset('assets/image/galeri/' . $galeri->gambar) }}"
                                    alt="{{ $galeri->judul }}"
                                    loading="lazy"
                                >

                                <div class="gallery-image-overlay"></div>


                                {{-- BADGE --}}
                                <div class="gallery-badge">
                                    <i class="bi bi-camera-fill"></i>
                                    Kegiatan BLK
                                </div>


                                {{-- NOMOR --}}
                                <div class="gallery-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>

                            </div>


                            {{-- CONTENT --}}
                            <div class="gallery-content">

                                <h3 class="gallery-title">
                                    {{ $galeri->judul }}
                                </h3>


                                @if($galeri->deskripsi)

                                    <p class="gallery-description">
                                        {{ Str::limit($galeri->deskripsi, 120) }}
                                    </p>

                                @else

                                    <p class="gallery-description">
                                        Dokumentasi kegiatan Balai Latihan
                                        Kerja Kabupaten Indramayu.
                                    </p>

                                @endif


                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('galeri.detail', $galeri->id) }}"
                                    class="btn btn-primary btn-gallery-detail"
                                >
                                    <span>Lihat Detail</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- PAGINATION --}}
            @if(method_exists($galeris, 'hasPages') && $galeris->hasPages())

                <div class="gallery-pagination d-flex justify-content-center">

                    {{ $galeris->links() }}

                </div>

            @endif


        @else

            {{-- EMPTY STATE --}}
            <div class="empty-gallery text-center">

                <div class="empty-icon">
                    <i class="bi bi-images"></i>
                </div>

                <h3 class="empty-title">
                    Belum Ada Galeri
                </h3>

                <p class="empty-text mb-0">
                    Dokumentasi kegiatan BLK Kabupaten Indramayu
                    belum tersedia saat ini.
                </p>

            </div>

        @endif

    </div>

</section>


@include('dashboard.footer')

@endsection