@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

@include('dashboard.navbar')

<style>
    /* ==========================================
       HERO
    ========================================== */

    .structure-hero {
        position: relative;
        overflow: hidden;
        padding: 85px 0 95px;
        background:
            radial-gradient(
                circle at 85% 20%,
                rgba(255,255,255,.13),
                transparent 28%
            ),
            linear-gradient(
                135deg,
                #0d6efd 0%,
                #0a58ca 55%,
                #084298 100%
            );
    }

    .structure-hero::before {
        content: "";
        position: absolute;
        width: 360px;
        height: 360px;
        border: 60px solid rgba(255,255,255,.06);
        border-radius: 50%;
        top: -190px;
        right: -100px;
    }

    .structure-hero::after {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border: 40px solid rgba(255,255,255,.05);
        border-radius: 50%;
        bottom: -150px;
        left: -80px;
    }

    .structure-hero .container {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 16px;
        border-radius: 50px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.18);
        color: #fff;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .07em;
        margin-bottom: 20px;
    }

    .structure-hero h1 {
        font-size: clamp(34px, 5vw, 52px);
        font-weight: 800;
        letter-spacing: -.025em;
        margin-bottom: 18px;
    }

    .structure-hero p {
        max-width: 780px;
        margin: auto;
        color: rgba(255,255,255,.84);
        line-height: 1.8;
        font-size: 16px;
    }


    /* ==========================================
       INTRO
    ========================================== */

    .structure-intro {
        padding: 85px 0 45px;
    }

    .section-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #0d6efd;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .section-label::before {
        content: "";
        width: 28px;
        height: 3px;
        border-radius: 20px;
        background: #0d6efd;
    }

    .structure-intro h2 {
        color: #172033;
        font-size: clamp(28px, 4vw, 40px);
        font-weight: 800;
        margin-top: 12px;
        margin-bottom: 15px;
    }

    .structure-intro p {
        max-width: 800px;
        margin: auto;
        color: #667085;
        line-height: 1.85;
    }


    /* ==========================================
       IMAGE CARD
    ========================================== */

    .structure-card {
        background: #fff;
        border: 1px solid #edf1f5;
        border-radius: 24px;
        padding: 18px;
        box-shadow: 0 18px 50px rgba(15,23,42,.09);
        overflow: hidden;
    }

    .structure-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 17px;
        background: #f4f7fb;
        cursor: zoom-in;
    }

    .structure-image-container::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,.18),
            transparent 35%
        );
        opacity: 0;
        transition: .3s ease;
        pointer-events: none;
    }

    .structure-image-container:hover::after {
        opacity: 1;
    }

    .structure-image {
        display: block;
        width: 100%;
        height: auto;
        max-height: 680px;
        object-fit: contain;
        transition: transform .45s ease;
    }

    .structure-image-container:hover .structure-image {
        transform: scale(1.015);
    }

    .structure-card-footer {
        padding: 20px 5px 5px;
    }

    .structure-card-footer h5 {
        color: #172033;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .structure-card-footer p {
        color: #667085;
        font-size: 14px;
        margin-bottom: 18px;
    }

    .zoom-button {
        border-radius: 11px;
        padding: 11px 19px;
        font-weight: 700;
    }


    /* ==========================================
       INFO CARDS
    ========================================== */

    .info-section {
        padding: 80px 0;
        background: #f8fafc;
    }

    .info-card {
        height: 100%;
        background: #fff;
        border: 1px solid #edf1f5;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 35px rgba(15,23,42,.05);
        transition: all .25s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15,23,42,.09);
    }

    .info-icon {
        width: 55px;
        height: 55px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13,110,253,.09);
        color: #0d6efd;
        font-size: 23px;
        margin-bottom: 20px;
    }

    .info-card h4 {
        color: #172033;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .info-card p {
        color: #667085;
        line-height: 1.85;
        margin: 0;
        text-align: justify;
    }


    /* ==========================================
       KETERANGAN
    ========================================== */

    .description-box {
        background: #fff;
        border-radius: 22px;
        border: 1px solid #edf1f5;
        padding: 35px;
        box-shadow: 0 12px 35px rgba(15,23,42,.06);
    }

    .description-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .description-title-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: rgba(13,110,253,.09);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .description-title h3 {
        margin: 0;
        color: #172033;
        font-weight: 800;
        font-size: 23px;
    }

    .description-box p {
        color: #667085;
        line-height: 1.9;
        text-align: justify;
        margin-bottom: 15px;
    }

    .description-box p:last-child {
        margin-bottom: 0;
    }


    /* ==========================================
       MODAL
    ========================================== */

    .structure-modal .modal-content {
        border: 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 80px rgba(0,0,0,.25);
    }

    .structure-modal .modal-header {
        padding: 17px 22px;
        border-bottom: 1px solid #edf1f5;
        background: #fff;
    }

    .structure-modal .modal-title {
        color: #172033;
        font-weight: 800;
        font-size: 17px;
    }

    .structure-modal .modal-body {
        padding: 15px;
        background: #f4f6f8;
    }

    .modal-image-wrapper {
        background: #fff;
        border-radius: 14px;
        padding: 10px;
        overflow: auto;
        text-align: center;
    }

    .modal-image {
        max-width: 100%;
        height: auto;
        display: inline-block;
    }


    /* ==========================================
       RESPONSIVE
    ========================================== */

    @media (max-width: 767px) {

        .structure-hero {
            padding: 60px 0 70px;
        }

        .structure-hero h1 {
            font-size: 34px;
        }

        .structure-hero p {
            font-size: 14px;
        }

        .structure-intro {
            padding: 65px 0 35px;
        }

        .structure-card {
            padding: 12px;
            border-radius: 18px;
        }

        .structure-card-footer {
            padding: 17px 3px 3px;
        }

        .info-section {
            padding: 65px 0;
        }

        .info-card,
        .description-box {
            padding: 25px;
        }

        .description-box p {
            text-align: left;
        }

    }
</style>


{{-- ==========================================
     HERO
=========================================== --}}
<section class="structure-hero text-white">

    <div class="container text-center">

        <span class="hero-badge">
            <i class="bi bi-diagram-3-fill"></i>
            ORGANISASI BLK
        </span>

        <h1>
            Struktur Organisasi
        </h1>

        <p>
            Struktur organisasi Balai Latihan Kerja Kabupaten Indramayu
            sebagai dasar pelaksanaan tugas, fungsi, koordinasi, dan
            pelayanan dalam penyelenggaraan pelatihan kerja.
        </p>

    </div>

</section>


{{-- ==========================================
     INTRO
=========================================== --}}
<section class="structure-intro">

    <div class="container text-center">

        <div class="section-label">
            Struktur BLK
        </div>

        <h2>
            Struktur Organisasi BLK Kabupaten Indramayu
        </h2>

        <p>
            Struktur organisasi menggambarkan pembagian tugas,
            tanggung jawab, serta hubungan koordinasi antar bagian
            dalam pelaksanaan pelayanan dan penyelenggaraan
            pelatihan kerja.
        </p>

    </div>

</section>


{{-- ==========================================
     STRUKTUR IMAGE
=========================================== --}}
<section class="pb-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-11">

                <div class="structure-card">

                    <div
                        class="structure-image-container"
                        data-bs-toggle="modal"
                        data-bs-target="#modalStruktur"
                    >

                        <img
                            src="{{ asset('assets/image/galeri/Struktur.png') }}"
                            alt="Struktur Organisasi BLK Kabupaten Indramayu"
                            class="structure-image"
                        >

                    </div>


                    <div class="structure-card-footer text-center">

                        <h5>
                            Struktur Organisasi
                        </h5>

                        <p>
                            Klik tombol di bawah untuk melihat struktur
                            organisasi dalam ukuran yang lebih besar.
                        </p>

                        <button
                            type="button"
                            class="btn btn-primary zoom-button"
                            data-bs-toggle="modal"
                            data-bs-target="#modalStruktur"
                        >
                            <i class="bi bi-arrows-fullscreen me-2"></i>
                            Perbesar Gambar
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ==========================================
     INFORMASI
=========================================== --}}
<section class="info-section">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h4>
                        Pembagian Tugas
                    </h4>

                    <p>
                        Struktur organisasi disusun untuk memastikan
                        setiap unit kerja memiliki tugas dan tanggung
                        jawab yang jelas dalam mendukung penyelenggaraan
                        pelayanan serta program pelatihan kerja.
                    </p>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>

                    <h4>
                        Koordinasi Organisasi
                    </h4>

                    <p>
                        Hubungan koordinasi antar bagian mendukung
                        pelaksanaan program agar dapat berjalan secara
                        efektif, efisien, terarah, dan sesuai dengan
                        tujuan pelayanan BLK.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ==========================================
     KETERANGAN
=========================================== --}}
<section class="py-5">

    <div class="container">

        <div class="description-box">

            <div class="description-title">

                <div class="description-title-icon">
                    <i class="bi bi-info-circle-fill"></i>
                </div>

                <h3>
                    Keterangan
                </h3>

            </div>

            <p>
                Struktur organisasi Balai Latihan Kerja Kabupaten
                Indramayu disusun untuk memastikan setiap unit kerja
                memiliki tugas, fungsi, dan tanggung jawab yang jelas
                sehingga pelayanan kepada masyarakat dapat berjalan
                secara efektif, efisien, dan akuntabel.
            </p>

            <p>
                Melalui struktur organisasi yang terkoordinasi dengan
                baik, setiap program pelatihan dapat direncanakan,
                dilaksanakan, diawasi, serta dievaluasi secara optimal
                guna meningkatkan kualitas pelayanan dan kompetensi
                tenaga kerja.
            </p>

        </div>

    </div>

</section>


{{-- ==========================================
     MODAL GAMBAR
=========================================== --}}
<div
    class="modal fade structure-modal"
    id="modalStruktur"
    tabindex="-1"
    aria-labelledby="modalStrukturLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="modalStrukturLabel"
                >
                    <i class="bi bi-diagram-3-fill text-primary me-2"></i>
                    Struktur Organisasi BLK Kabupaten Indramayu
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>

            <div class="modal-body">

                <div class="modal-image-wrapper">

                    <img
                        src="{{ asset('assets/image/galeri/Struktur.png') }}"
                        alt="Struktur Organisasi BLK Kabupaten Indramayu"
                        class="modal-image"
                    >

                </div>

            </div>

        </div>

    </div>

</div>


@include('dashboard.footer')

@endsection