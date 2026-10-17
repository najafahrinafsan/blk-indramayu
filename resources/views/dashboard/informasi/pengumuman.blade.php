@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')

@include('dashboard.navbar')

<style>
    /* =====================================================
       PENGUMUMAN PAGE
    ===================================================== */

    .announcement-page {
        min-height: 100vh;
        background:
            linear-gradient(
                180deg,
                #f4f8ff 0%,
                #f8fafc 38%,
                #ffffff 100%
            );
        padding-bottom: 80px;
    }

    .announcement-container {
        width: 90%;
        max-width: 1240px;
        margin: 0 auto;
    }


    /* =====================================================
       HERO
    ===================================================== */

    .announcement-hero {
        position: relative;
        overflow: hidden;
        padding: 65px 0 80px;
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
                #0b5ed7 48%,
                #084298 100%
            );
        color: #ffffff;
    }

    .announcement-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        top: -170px;
        right: 7%;
    }

    .announcement-hero::after {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: rgba(255,255,255,.05);
        bottom: -150px;
        left: 6%;
    }

    .announcement-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 850px;
        margin: auto;
    }

    .announcement-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border-radius: 50px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.22);
        backdrop-filter: blur(10px);
        color: #ffffff;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .04em;
        margin-bottom: 20px;
    }

    .announcement-hero h1 {
        font-size: clamp(32px, 5vw, 52px);
        line-height: 1.15;
        font-weight: 800;
        margin: 0 0 18px;
        letter-spacing: -.02em;
    }

    .announcement-hero p {
        max-width: 760px;
        margin: 0 auto;
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255,255,255,.82);
    }


    /* =====================================================
       CONTENT AREA
    ===================================================== */

    .announcement-content {
        position: relative;
        z-index: 3;
        margin-top: -35px;
    }


    /* =====================================================
       BACK BUTTON
    ===================================================== */

    .announcement-back-wrapper {
        margin-bottom: 25px;
    }

    .announcement-back-button {
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

    .announcement-back-button:hover {
        background: #1268e8;
        color: #ffffff !important;
        border-color: #1268e8;
        transform: translateX(-4px);
        box-shadow: 0 10px 28px rgba(13,110,253,.20);
    }


    /* =====================================================
       SECTION INTRO
    ===================================================== */

    .announcement-section-intro {
        margin-bottom: 32px;
    }

    .announcement-section-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #1268e8;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .09em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .announcement-section-title {
        color: #172033;
        font-size: 28px;
        font-weight: 800;
        margin: 0;
    }

    .announcement-section-description {
        color: #64748b;
        margin: 8px 0 0;
        line-height: 1.7;
        font-size: 15px;
    }


    /* =====================================================
       CARD
    ===================================================== */

    .announcement-card {
        position: relative;
        height: 100%;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e7ebf0;
        border-radius: 24px;
        box-shadow: 0 10px 35px rgba(15,23,42,.06);
        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .announcement-card:hover {
        transform: translateY(-7px);
        border-color: #d5e3f7;
        box-shadow: 0 20px 50px rgba(15,23,42,.11);
    }


    /* =====================================================
       IMAGE
    ===================================================== */

    .announcement-image {
        position: relative;
        padding: 12px;
        background:
            linear-gradient(
                135deg,
                #eef4fc,
                #f8fafc
            );
        overflow: hidden;
    }

    .announcement-image::after {
        content: "";
        position: absolute;
        inset: 12px;
        border-radius: 16px;
        border: 1px solid rgba(13,110,253,.08);
        pointer-events: none;
    }

    .announcement-image img {
        width: 100%;
        height: 390px;
        object-fit: contain;
        display: block;
        background: #ffffff;
        border-radius: 16px;
        transition:
            transform .45s ease,
            filter .45s ease;
    }

    .announcement-card:hover .announcement-image img {
        transform: scale(1.025);
    }


    /* =====================================================
       NO IMAGE
    ===================================================== */

    .announcement-no-image {
        height: 390px;
        padding: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        background:
            linear-gradient(
                135deg,
                #f1f5f9,
                #e9eff7
            );
    }

    .announcement-no-image-icon {
        width: 78px;
        height: 78px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        border-radius: 22px;
        background: #ffffff;
        color: #1268e8;
        font-size: 32px;
        box-shadow: 0 10px 30px rgba(15,23,42,.08);
    }

    .announcement-no-image h6 {
        color: #334155;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .announcement-no-image p {
        color: #94a3b8;
        margin: 0;
        font-size: 13px;
    }


    /* =====================================================
       CARD BODY
    ===================================================== */

    .announcement-card-body {
        padding: 25px;
        display: flex;
        flex-direction: column;
        min-height: 320px;
    }


    /* =====================================================
       TOP INFORMATION
    ===================================================== */

    .announcement-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .announcement-icon {
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #1268e8;
        font-size: 21px;
        transition: all .25s ease;
    }

    .announcement-card:hover .announcement-icon {
        background: #1268e8;
        color: #ffffff;
        transform: rotate(-3deg);
    }

    .announcement-date {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #64748b;
        font-size: 13px;
        white-space: nowrap;
    }

    .announcement-date i {
        color: #1268e8;
        font-size: 14px;
    }


    /* =====================================================
       LABEL
    ===================================================== */

    .announcement-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        align-self: flex-start;
        padding: 7px 13px;
        border-radius: 50px;
        background: #eaf2ff;
        color: #1268e8;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .03em;
        margin-bottom: 14px;
    }

    .announcement-label::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #1268e8;
    }


    /* =====================================================
       TITLE
    ===================================================== */

    .announcement-card h3 {
        color: #172033;
        font-size: 22px;
        font-weight: 800;
        line-height: 1.4;
        margin: 0 0 13px;
    }


    /* =====================================================
       TEXT
    ===================================================== */

    .announcement-text {
        color: #64748b;
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .announcement-footer {
        margin-top: auto;
        padding-top: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .detail-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        padding: 12px 18px;
        border-radius: 12px;
        background: #1268e8;
        color: #ffffff !important;
        text-decoration: none !important;
        font-size: 13px;
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(18,104,232,.15);
        transition: all .25s ease;
    }

    .detail-button:hover {
        background: #0957ca;
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(18,104,232,.23);
    }

    .detail-button i {
        transition: transform .25s ease;
    }

    .detail-button:hover i {
        transform: translateX(4px);
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .announcement-empty {
        background: #ffffff;
        border: 1px solid #e7ebf0;
        border-radius: 24px;
        padding: 75px 30px;
        text-align: center;
        box-shadow: 0 10px 35px rgba(15,23,42,.06);
    }

    .announcement-empty-icon {
        width: 90px;
        height: 90px;
        margin: 0 auto 22px;
        border-radius: 50%;
        background: #eaf2ff;
        color: #1268e8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
    }

    .announcement-empty h3 {
        color: #172033;
        font-size: 23px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .announcement-empty p {
        color: #64748b;
        margin: 0;
        font-size: 14px;
    }


    /* =====================================================
       PAGINATION
    ===================================================== */

    .announcement-pagination {
        margin-top: 45px;
        display: flex;
        justify-content: center;
    }

    .announcement-pagination nav {
        display: flex;
        justify-content: center;
    }

    .announcement-pagination .pagination {
        margin: 0;
        gap: 5px;
    }

    .announcement-pagination .page-link {
        border-radius: 10px !important;
        border: 1px solid #dbe5f1;
        color: #1268e8;
        min-width: 38px;
        text-align: center;
    }

    .announcement-pagination .page-item.active .page-link {
        background: #1268e8;
        border-color: #1268e8;
        color: #ffffff;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 992px) {

        .announcement-hero {
            padding: 55px 0 70px;
        }

        .announcement-image img,
        .announcement-no-image {
            height: 350px;
        }

        .announcement-card-body {
            min-height: 300px;
        }

    }


    @media (max-width: 768px) {

        .announcement-container {
            width: 92%;
        }

        .announcement-hero {
            padding: 45px 0 60px;
        }

        .announcement-content {
            margin-top: -25px;
        }

        .announcement-section-title {
            font-size: 24px;
        }

        .announcement-image {
            padding: 10px;
        }

        .announcement-image::after {
            inset: 10px;
        }

        .announcement-image img,
        .announcement-no-image {
            height: 330px;
        }

        .announcement-card-body {
            padding: 22px;
        }

        .announcement-card h3 {
            font-size: 20px;
        }

        .announcement-text {
            font-size: 14px;
        }

    }


    @media (max-width: 576px) {

        .announcement-page {
            padding-bottom: 55px;
        }

        .announcement-hero {
            padding: 38px 0 55px;
        }

        .announcement-hero h1 {
            font-size: 30px;
        }

        .announcement-hero p {
            font-size: 14px;
            line-height: 1.7;
        }

        .announcement-badge {
            font-size: 11px;
            padding: 8px 14px;
        }

        .announcement-back-button {
            width: 100%;
            justify-content: center;
        }

        .announcement-top {
            align-items: flex-start;
        }

        .announcement-date {
            white-space: normal;
            text-align: right;
            justify-content: flex-end;
            font-size: 11px;
        }

        .announcement-icon {
            width: 46px;
            height: 46px;
            font-size: 19px;
        }

        .announcement-image img,
        .announcement-no-image {
            height: 300px;
        }

        .announcement-card-body {
            min-height: 0;
            padding: 20px;
        }

        .announcement-card h3 {
            font-size: 19px;
        }

        .announcement-text {
            font-size: 13px;
            line-height: 1.75;
        }

        .announcement-footer {
            padding-top: 20px;
        }

        .announcement-empty {
            padding: 55px 20px;
        }

        .announcement-empty-icon {
            width: 75px;
            height: 75px;
            font-size: 31px;
        }

        .announcement-empty h3 {
            font-size: 20px;
        }

    }
</style>


{{-- =====================================================
     HERO
===================================================== --}}
<section class="announcement-hero">

    <div class="announcement-container">

        <div class="announcement-hero-content">

            <div class="announcement-badge">
                <i class="bi bi-bell-fill"></i>
                INFORMASI TERBARU
            </div>

            <h1>
                Pengumuman Terbaru
            </h1>

            <p>
                Dapatkan informasi terbaru mengenai jadwal pelatihan,
                pendaftaran peserta, seleksi, dan berbagai kegiatan
                di Balai Latihan Kerja Kabupaten Indramayu.
            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     CONTENT
===================================================== --}}
<div class="announcement-page">

    <div class="announcement-container announcement-content">

        {{-- =================================================
             BUTTON KEMBALI
        ================================================== --}}
        <div class="announcement-back-wrapper">

            <a
                href="{{ url('/') }}"
                class="announcement-back-button"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Beranda
            </a>

        </div>


        {{-- =================================================
             SECTION INTRO
        ================================================== --}}
        <div class="announcement-section-intro">

            <div class="announcement-section-label">
                <i class="bi bi-megaphone-fill"></i>
                Informasi BLK
            </div>

            <h2 class="announcement-section-title">
                Informasi & Pengumuman
            </h2>

            <p class="announcement-section-description">
                Temukan berbagai informasi terbaru dan penting
                dari BLK Kabupaten Indramayu.
            </p>

        </div>


        {{-- =================================================
             DATA PENGUMUMAN
        ================================================== --}}
        @if(isset($pengumumans) && $pengumumans->count() > 0)

            <div class="row g-4">

                @foreach($pengumumans as $pengumuman)

                    <div class="col-lg-6">

                        <article class="announcement-card">

                            {{-- =================================
                                 GAMBAR PENGUMUMAN
                            ================================== --}}

                            @if($pengumuman->gambar)

                                <div class="announcement-image">

                                    <img
                                        src="{{ asset('assets/image/pengumuman/' . $pengumuman->gambar) }}"
                                        alt="{{ $pengumuman->judul }}"
                                        loading="lazy"
                                    >

                                </div>

                            @else

                                <div class="announcement-no-image">

                                    <div>

                                        <div class="announcement-no-image-icon">
                                            <i class="bi bi-megaphone-fill"></i>
                                        </div>

                                        <h6>
                                            Pengumuman BLK
                                        </h6>

                                        <p>
                                            Tidak ada gambar tersedia
                                        </p>

                                    </div>

                                </div>

                            @endif


                            {{-- =================================
                                 CARD BODY
                            ================================== --}}

                            <div class="announcement-card-body">

                                {{-- =================================
                                     BAGIAN ATAS
                                ================================== --}}

                                <div class="announcement-top">

                                    <div class="announcement-icon">
                                        <i class="bi bi-megaphone-fill"></i>
                                    </div>

                                    <div class="announcement-date">

                                        <i class="bi bi-calendar3"></i>

                                        {{ $pengumuman->tanggal
                                            ? \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y')
                                            : ($pengumuman->created_at
                                                ? \Carbon\Carbon::parse($pengumuman->created_at)->translatedFormat('d F Y')
                                                : '-')
                                        }}

                                    </div>

                                </div>


                                {{-- =================================
                                     LABEL
                                ================================== --}}

                                <span class="announcement-label">
                                    Pengumuman
                                </span>


                                {{-- =================================
                                     JUDUL
                                ================================== --}}

                                <h3>
                                    {{ $pengumuman->judul }}
                                </h3>


                                {{-- =================================
                                     ISI
                                ================================== --}}

                                <p class="announcement-text">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($pengumuman->isi),
                                        180
                                    ) }}

                                </p>


                                {{-- =================================
                                     FOOTER
                                ================================== --}}

                                <div class="announcement-footer">

                                    <a
                                        href="{{ route('pengumuman.detail', $pengumuman->id) }}"
                                        class="detail-button"
                                    >
                                        Lihat Detail
                                        <i class="bi bi-arrow-right"></i>
                                    </a>

                                </div>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            @if($pengumumans->hasPages())

                <div class="announcement-pagination">

                    {{ $pengumumans->links() }}

                </div>

            @endif


        @else

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="announcement-empty">

                <div class="announcement-empty-icon">
                    <i class="bi bi-megaphone"></i>
                </div>

                <h3>
                    Belum Ada Pengumuman
                </h3>

                <p>
                    Saat ini belum tersedia pengumuman terbaru.
                </p>

            </div>

        @endif

    </div>

</div>


@include('dashboard.footer')

@endsection