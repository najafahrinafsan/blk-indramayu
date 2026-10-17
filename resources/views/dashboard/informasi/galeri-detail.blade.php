@extends('layouts.app')

@section('title', $galeri->judul)

@section('content')

@include('dashboard.navbar')

<style>
    /* =====================================================
       HERO
    ===================================================== */

    .detail-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            #0d6efd 0%,
            #0b5ed7 55%,
            #084298 100%
        );
        padding: 65px 0 75px;
        color: #fff;
    }

    .detail-hero::before {
        content: "";
        position: absolute;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .07);
        top: -220px;
        right: -100px;
    }

    .detail-hero::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .05);
        bottom: -170px;
        left: -70px;
    }

    .detail-hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: auto;
    }

    .detail-hero-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
        background: rgba(255, 255, 255, .14);
        border: 1px solid rgba(255, 255, 255, .22);
        font-size: .78rem;
        font-weight: 600;
        letter-spacing: .7px;
        margin-bottom: 18px;
    }

    .detail-hero-title {
        font-size: clamp(2rem, 4vw, 3.1rem);
        font-weight: 800;
        line-height: 1.2;
        margin: 0;
    }


    /* =====================================================
       MAIN
    ===================================================== */

    .detail-section {
        background: #f8fafc;
        padding: 65px 0 80px;
    }

    .detail-container {
        max-width: 1100px;
        margin: auto;
    }


    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 17px;
        border-radius: 11px;
        background: #fff;
        border: 1px solid #e2e8f0;
        color: #475569;
        text-decoration: none;
        font-size: .88rem;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        transition: all .25s ease;
    }

    .back-button i {
        transition: transform .25s ease;
    }

    .back-button:hover {
        color: #0d6efd;
        border-color: #0d6efd;
        transform: translateX(-3px);
        box-shadow: 0 7px 20px rgba(13, 110, 253, .08);
    }

    .back-button:hover i {
        transform: translateX(-3px);
    }


    /* =====================================================
       DETAIL CARD
    ===================================================== */

    .detail-wrapper {
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(15, 23, 42, .08);
    }


    /* =====================================================
       PHOTO
    ===================================================== */

    .detail-photo {
        position: relative;
        min-height: 480px;
        padding: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            linear-gradient(135deg, #eef5ff, #f8fafc);
    }

    .detail-photo-frame {
        position: relative;
        width: 100%;
        height: 430px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border-radius: 18px;
        padding: 10px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .08);
        overflow: hidden;
    }

    .detail-photo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        border-radius: 12px;
        transition: transform .5s ease;
    }

    .detail-photo-frame:hover img {
        transform: scale(1.025);
    }

    .photo-label {
        position: absolute;
        left: 20px;
        top: 20px;
        z-index: 2;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 14px;
        border-radius: 50px;
        background: rgba(15, 23, 42, .75);
        color: #fff;
        font-size: .75rem;
        font-weight: 600;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }


    /* =====================================================
       INFORMATION
    ===================================================== */

    .detail-info {
        padding: 38px 42px 42px;
    }

    .detail-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 13px;
        border-radius: 50px;
        background: rgba(13, 110, 253, .09);
        color: #0d6efd;
        font-size: .76rem;
        font-weight: 700;
        letter-spacing: .4px;
        margin-bottom: 16px;
    }

    .detail-title {
        color: #16213e;
        font-size: clamp(1.7rem, 3vw, 2.25rem);
        line-height: 1.35;
        font-weight: 800;
        margin: 0;
    }

    .title-line {
        width: 55px;
        height: 4px;
        margin: 19px 0 22px;
        border-radius: 50px;
        background: #0d6efd;
    }


    /* =====================================================
       DESCRIPTION
    ===================================================== */

    .description-box {
        padding: 22px;
        border-radius: 15px;
        background: #f8fafc;
        border: 1px solid #eef2f7;
    }

    .description {
        color: #64748b;
        font-size: .95rem;
        line-height: 1.9;
        margin: 0;
    }


    /* =====================================================
       BOTTOM NAVIGATION
    ===================================================== */

    .bottom-navigation {
        display: flex;
        justify-content: center;
        margin-top: 35px;
    }

    .btn-back-gallery {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 12px 24px;
        border-radius: 12px;
        background: #0d6efd;
        color: #fff;
        text-decoration: none;
        font-size: .9rem;
        font-weight: 600;
        box-shadow: 0 7px 20px rgba(13, 110, 253, .18);
        transition: all .25s ease;
    }

    .btn-back-gallery:hover {
        background: #0b5ed7;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(13, 110, 253, .25);
    }

    .btn-back-gallery i {
        transition: transform .25s ease;
    }

    .btn-back-gallery:hover i {
        transform: translateX(-3px);
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 767.98px) {

        .detail-hero {
            padding: 55px 0 60px;
        }

        .detail-hero-title {
            font-size: 2rem;
        }

        .detail-section {
            padding: 45px 0 65px;
        }

        .detail-photo {
            min-height: 320px;
            padding: 15px;
        }

        .detail-photo-frame {
            height: 290px;
        }

        .photo-label {
            left: 12px;
            top: 12px;
            font-size: .7rem;
        }

        .detail-info {
            padding: 28px 22px 30px;
        }

        .detail-title {
            font-size: 1.55rem;
        }

        .description-box {
            padding: 18px;
        }

        .description {
            font-size: .88rem;
            line-height: 1.8;
        }

    }

    @media (max-width: 575.98px) {

        .back-button {
            font-size: .82rem;
            padding: 9px 14px;
        }

        .detail-photo {
            min-height: 280px;
        }

        .detail-photo-frame {
            height: 245px;
        }

        .detail-label {
            font-size: .7rem;
        }

        .bottom-navigation {
            margin-top: 25px;
        }

        .btn-back-gallery {
            width: 100%;
        }

    }
</style>


{{-- =====================================================
     HERO
====================================================== --}}
<section class="detail-hero">

    <div class="container">

        <div class="detail-hero-content text-center">

            <div class="detail-hero-label">
                <i class="bi bi-camera-fill"></i>
                DETAIL DOKUMENTASI
            </div>

            <h1 class="detail-hero-title">
                {{ $galeri->judul }}
            </h1>

        </div>

    </div>

</section>


{{-- =====================================================
     DETAIL
====================================================== --}}
<section class="detail-section">

    <div class="container detail-container">

        {{-- KEMBALI --}}
        <div class="mb-4">

            <a
                href="{{ route('galeri') }}"
                class="back-button"
            >
                <i class="bi bi-arrow-left"></i>
                <span>Kembali ke Galeri</span>
            </a>

        </div>


        {{-- DETAIL CARD --}}
        <div class="detail-wrapper">

            {{-- FOTO --}}
            <div class="detail-photo">

                <div class="detail-photo-frame">

                    <div class="photo-label">
                        <i class="bi bi-images"></i>
                        Dokumentasi BLK
                    </div>

                    <img
                        src="{{ asset('assets/image/galeri/' . $galeri->gambar) }}"
                        alt="{{ $galeri->judul }}"
                        loading="lazy"
                    >

                </div>

            </div>


            {{-- INFORMASI --}}
            <div class="detail-info">

                <div class="detail-label">
                    <i class="bi bi-camera-fill"></i>
                    Dokumentasi Kegiatan
                </div>


                <h2 class="detail-title">
                    {{ $galeri->judul }}
                </h2>


                <div class="title-line"></div>


                @if($galeri->deskripsi)

                    <div class="description-box">

                        <p class="description">
                            {!! nl2br(e($galeri->deskripsi)) !!}
                        </p>

                    </div>

                @else

                    <div class="description-box">

                        <p class="description text-muted">
                            Dokumentasi kegiatan Balai Latihan Kerja
                            Kabupaten Indramayu.
                        </p>

                    </div>

                @endif

            </div>

        </div>


        {{-- NAVIGASI --}}
        <div class="bottom-navigation">

            <a
                href="{{ route('galeri') }}"
                class="btn-back-gallery"
            >
                <i class="bi bi-images"></i>
                <span>Lihat Galeri Lainnya</span>
            </a>

        </div>

    </div>

</section>


@include('dashboard.footer')

@endsection