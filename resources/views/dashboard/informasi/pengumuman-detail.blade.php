@extends('layouts.app')

@section('title', $pengumuman->judul)

@section('content')

@include('dashboard.navbar')

<style>
    /* =====================================================
       ANNOUNCEMENT DETAIL
    ===================================================== */

    .announcement-detail-page {
        min-height: 100vh;
        background:
            linear-gradient(
                180deg,
                #f4f8ff 0%,
                #f8fafc 45%,
                #ffffff 100%
            );
        padding-bottom: 80px;
    }

    .announcement-detail-container {
        width: 90%;
        max-width: 1050px;
        margin: 0 auto;
    }


    /* =====================================================
       HERO
    ===================================================== */

    .announcement-detail-hero {
        position: relative;
        overflow: hidden;
        padding: 55px 0 85px;
        background:
            radial-gradient(
                circle at 10% 20%,
                rgba(255,255,255,.15),
                transparent 30%
            ),
            radial-gradient(
                circle at 90% 80%,
                rgba(255,255,255,.12),
                transparent 30%
            ),
            linear-gradient(
                135deg,
                #0d6efd 0%,
                #0b5ed7 50%,
                #084298 100%
            );
        color: #ffffff;
    }

    .announcement-detail-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        top: -170px;
        right: 5%;
    }

    .announcement-detail-hero::after {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,.05);
        bottom: -130px;
        left: 8%;
    }

    .announcement-detail-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 900px;
        margin: auto;
    }

    .announcement-detail-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 17px;
        border-radius: 50px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.22);
        backdrop-filter: blur(10px);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .05em;
        margin-bottom: 18px;
    }

    .announcement-detail-hero-content h1 {
        font-size: clamp(28px, 4vw, 45px);
        font-weight: 800;
        line-height: 1.25;
        margin: 0;
    }

    .announcement-detail-hero-content p {
        margin: 15px auto 0;
        max-width: 700px;
        color: rgba(255,255,255,.80);
        font-size: 15px;
        line-height: 1.7;
    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .announcement-detail-content-wrapper {
        position: relative;
        z-index: 3;
        margin-top: -45px;
    }


    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .back-button-wrapper {
        margin-bottom: 25px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 11px 18px;
        background: #ffffff;
        color: #1268e8 !important;
        border: 1px solid #dbe5f1;
        border-radius: 12px;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 700;
        box-shadow: 0 8px 25px rgba(15,23,42,.08);
        transition: all .25s ease;
    }

    .back-button:hover {
        background: #1268e8;
        color: #ffffff !important;
        border-color: #1268e8;
        transform: translateX(-4px);
        box-shadow: 0 12px 28px rgba(13,110,253,.20);
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .announcement-detail-card {
        background: #ffffff;
        border-radius: 28px;
        overflow: hidden;
        border: 1px solid #e5eaf0;
        box-shadow: 0 18px 55px rgba(15,23,42,.09);
    }


    /* =====================================================
       IMAGE
    ===================================================== */

    .announcement-detail-image {
        position: relative;
        padding: 15px;
        background:
            linear-gradient(
                135deg,
                #edf4fd,
                #f8fafc
            );
        overflow: hidden;
    }

    .announcement-detail-image::after {
        content: "";
        position: absolute;
        inset: 15px;
        border: 1px solid rgba(13,110,253,.08);
        border-radius: 18px;
        pointer-events: none;
    }

    .announcement-detail-image img {
        width: 100%;
        max-height: 680px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 18px;
    }


    /* =====================================================
       CONTENT BODY
    ===================================================== */

    .announcement-detail-body {
        padding: 42px 48px 45px;
    }


    /* =====================================================
       META
    ===================================================== */

    .announcement-detail-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .announcement-detail-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #eaf2ff;
        color: #1268e8;
        padding: 8px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 800;
    }

    .announcement-detail-date {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #64748b;
        font-size: 13px;
    }

    .announcement-detail-date i {
        color: #1268e8;
    }


    /* =====================================================
       TITLE
    ===================================================== */

    .announcement-detail-body h1 {
        color: #172033;
        font-size: clamp(28px, 4vw, 40px);
        font-weight: 800;
        line-height: 1.3;
        margin: 0 0 22px;
    }


    /* =====================================================
       DECORATIVE LINE
    ===================================================== */

    .announcement-detail-line {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 28px;
    }

    .announcement-detail-line span {
        display: block;
        height: 4px;
        border-radius: 50px;
        background: #1268e8;
    }

    .announcement-detail-line span:first-child {
        width: 55px;
    }

    .announcement-detail-line span:last-child {
        width: 15px;
        opacity: .25;
    }


    /* =====================================================
       ARTICLE
    ===================================================== */

    .announcement-detail-text {
        color: #475569;
        font-size: 16px;
        line-height: 1.95;
        word-break: break-word;
    }

    .announcement-detail-text p {
        margin-bottom: 18px;
    }


    /* =====================================================
       INFORMATION BOX
    ===================================================== */

    .announcement-info-box {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-top: 32px;
        padding: 18px 20px;
        border-radius: 16px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
    }

    .announcement-info-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #dbeafe;
        color: #1268e8;
        font-size: 19px;
    }

    .announcement-info-box h6 {
        margin: 0 0 4px;
        color: #1e293b;
        font-weight: 800;
    }

    .announcement-info-box p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.7;
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .announcement-detail-footer {
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .back-button-bottom {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        background: #1268e8;
        color: #ffffff !important;
        text-decoration: none !important;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(18,104,232,.17);
        transition: all .25s ease;
    }

    .back-button-bottom:hover {
        background: #0957ca;
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(18,104,232,.24);
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 992px) {

        .announcement-detail-body {
            padding: 35px;
        }

        .announcement-detail-image img {
            max-height: 580px;
        }

    }


    @media (max-width: 768px) {

        .announcement-detail-hero {
            padding: 45px 0 70px;
        }

        .announcement-detail-container {
            width: 92%;
        }

        .announcement-detail-content-wrapper {
            margin-top: -30px;
        }

        .announcement-detail-image {
            padding: 10px;
        }

        .announcement-detail-image::after {
            inset: 10px;
        }

        .announcement-detail-image img {
            max-height: 520px;
            border-radius: 14px;
        }

        .announcement-detail-body {
            padding: 28px;
        }

        .announcement-detail-text {
            font-size: 15px;
            line-height: 1.85;
        }

    }


    @media (max-width: 576px) {

        .announcement-detail-page {
            padding-bottom: 55px;
        }

        .announcement-detail-hero {
            padding: 38px 0 60px;
        }

        .announcement-detail-hero-content h1 {
            font-size: 27px;
        }

        .announcement-detail-hero-content p {
            font-size: 13px;
        }

        .announcement-detail-hero-badge {
            font-size: 10px;
            padding: 8px 13px;
        }

        .back-button {
            width: 100%;
            justify-content: center;
        }

        .announcement-detail-image img {
            max-height: 450px;
        }

        .announcement-detail-body {
            padding: 22px 20px 25px;
        }

        .announcement-detail-body h1 {
            font-size: 24px;
        }

        .announcement-detail-text {
            font-size: 14px;
        }

        .announcement-detail-footer {
            margin-top: 28px;
        }

        .back-button-bottom {
            width: 100%;
            justify-content: center;
        }

        .announcement-info-box {
            padding: 15px;
        }

    }
</style>


{{-- =====================================================
     HERO
===================================================== --}}
<section class="announcement-detail-hero">

    <div class="announcement-detail-container">

        <div class="announcement-detail-hero-content">

            <div class="announcement-detail-hero-badge">
                <i class="bi bi-megaphone-fill"></i>
                DETAIL PENGUMUMAN
            </div>

            <h1>
                {{ $pengumuman->judul }}
            </h1>

            <p>
                Informasi resmi dari Balai Latihan Kerja
                Kabupaten Indramayu.
            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     MAIN CONTENT
===================================================== --}}
<div class="announcement-detail-page">

    <div class="announcement-detail-container announcement-detail-content-wrapper">

        {{-- =================================================
             BACK BUTTON
        ================================================== --}}
        <div class="back-button-wrapper">

            <a
                href="{{ route('pengumuman') }}"
                class="back-button"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Pengumuman
            </a>

        </div>


        {{-- =================================================
             DETAIL CARD
        ================================================== --}}
        <article class="announcement-detail-card">

            {{-- =============================================
                 GAMBAR PENGUMUMAN
            ============================================== --}}

            @if($pengumuman->gambar)

                <div class="announcement-detail-image">

                    <img
                        src="{{ asset('assets/image/pengumuman/' . $pengumuman->gambar) }}"
                        alt="{{ $pengumuman->judul }}"
                    >

                </div>

            @endif


            {{-- =============================================
                 CONTENT
            ============================================== --}}

            <div class="announcement-detail-body">

                {{-- META --}}

                <div class="announcement-detail-meta">

                    <span class="announcement-detail-label">
                        <i class="bi bi-megaphone-fill"></i>
                        Pengumuman
                    </span>

                    <span class="announcement-detail-date">

                        <i class="bi bi-calendar3"></i>

                        {{ $pengumuman->tanggal
                            ? \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y')
                            : ($pengumuman->created_at
                                ? \Carbon\Carbon::parse($pengumuman->created_at)->translatedFormat('d F Y')
                                : '-')
                        }}

                    </span>

                </div>


                {{-- TITLE --}}

                <h1>
                    {{ $pengumuman->judul }}
                </h1>


                {{-- DECORATIVE LINE --}}

                <div class="announcement-detail-line">
                    <span></span>
                    <span></span>
                </div>


                {{-- CONTENT --}}

                <div class="announcement-detail-text">

                    {!! nl2br(e($pengumuman->isi)) !!}

                </div>


                {{-- INFORMATION BOX --}}

                <div class="announcement-info-box">

                    <div class="announcement-info-icon">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <div>

                        <h6>
                            Informasi Penting
                        </h6>

                        <p>
                            Pastikan membaca seluruh informasi pengumuman
                            sebelum melakukan pendaftaran atau mengikuti
                            kegiatan yang diinformasikan.
                        </p>

                    </div>

                </div>


                {{-- FOOTER --}}

                <div class="announcement-detail-footer">

                    <a
                        href="{{ route('pengumuman') }}"
                        class="back-button-bottom"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Pengumuman
                    </a>

                </div>

            </div>

        </article>

    </div>

</div>


@include('dashboard.footer')

@endsection