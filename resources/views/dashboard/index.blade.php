@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@include('dashboard.navbar')

<style>
    /* ==========================================
       GLOBAL
    ========================================== */

    .home-page {
        overflow: hidden;
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

    /* ==========================================
       HERO
    ========================================== */

    .hero-section {
        position: relative;
        min-height: 680px;
        display: flex;
        align-items: center;
        background:
            radial-gradient(
                circle at 85% 20%,
                rgba(13, 110, 253, .13),
                transparent 28%
            ),
            radial-gradient(
                circle at 10% 90%,
                rgba(25, 135, 84, .08),
                transparent 25%
            ),
            linear-gradient(
                135deg,
                #f8fbff 0%,
                #ffffff 55%,
                #f4f8ff 100%
            );
        overflow: hidden;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        border: 70px solid rgba(13, 110, 253, .035);
        border-radius: 50%;
        top: -220px;
        right: -150px;
    }

    .hero-section::after {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border: 45px solid rgba(25, 135, 84, .035);
        border-radius: 50%;
        bottom: -170px;
        left: -100px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 9px 15px;
        border-radius: 50px;
        background: rgba(13, 110, 253, .08);
        color: #0d6efd;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .04em;
        margin-bottom: 22px;
    }

    .hero-badge i {
        font-size: 15px;
    }

    .hero-title {
        font-size: clamp(40px, 5vw, 64px);
        line-height: 1.08;
        letter-spacing: -.035em;
        color: #172033;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .hero-title .highlight {
        color: #0d6efd;
        display: block;
    }

    .hero-description {
        max-width: 650px;
        color: #667085;
        font-size: 17px;
        line-height: 1.85;
        margin-bottom: 30px;
    }

    .hero-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .hero-btn {
        padding: 13px 23px;
        border-radius: 12px;
        font-weight: 700;
        transition: all .25s ease;
    }

    .hero-btn:hover {
        transform: translateY(-2px);
    }

    /* HERO VISUAL */

    .hero-visual {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-circle {
        width: 430px;
        height: 430px;
        border-radius: 50%;
        background: linear-gradient(
            145deg,
            rgba(13, 110, 253, .10),
            rgba(13, 110, 253, .025)
        );
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .hero-circle::before {
        content: "";
        position: absolute;
        inset: 28px;
        border: 1px dashed rgba(13, 110, 253, .25);
        border-radius: 50%;
    }

    .hero-logo-box {
        width: 275px;
        height: 275px;
        border-radius: 40px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 38px;
        box-shadow:
            0 25px 70px rgba(13, 110, 253, .15),
            0 8px 25px rgba(15, 23, 42, .08);
        position: relative;
        animation: floating 4s ease-in-out infinite;
    }

    .hero-logo-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .floating-badge {
        position: absolute;
        display: flex;
        align-items: center;
        gap: 9px;
        background: #fff;
        padding: 11px 15px;
        border-radius: 13px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .10);
        font-size: 12px;
        font-weight: 700;
        color: #344054;
    }

    .floating-badge i {
        width: 30px;
        height: 30px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13, 110, 253, .09);
        color: #0d6efd;
    }

    .badge-one {
        left: -5px;
        top: 75px;
    }

    .badge-two {
        right: -15px;
        bottom: 75px;
    }

    @keyframes floating {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    /* ==========================================
       QUICK INFO
    ========================================== */

    .quick-info {
        margin-top: -45px;
        position: relative;
        z-index: 5;
    }

    .quick-info-card {
        background: #fff;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 15px 45px rgba(15, 23, 42, .09);
        border: 1px solid #eef2f7;
    }
    .floating-up-down {
    animation: floatingUpDown 3s ease-in-out infinite;
    will-change: transform;
}

.hero-floating-card.second.floating-up-down {
    animation-duration: 3.8s;
    animation-delay: -1.2s;
}

@keyframes floatingUpDown {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-18px);
    }

    100% {
        transform: translateY(0);
    }
}

    .quick-item {
        display: flex;
        align-items: center;
        gap: 15px;
        height: 100%;
    }

    .quick-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: rgba(13, 110, 253, .09);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .quick-item h6 {
        margin: 0 0 4px;
        font-weight: 800;
        color: #172033;
    }

    .quick-item p {
        margin: 0;
        color: #667085;
        font-size: 13px;
    }

    /* ==========================================
       ABOUT
    ========================================== */

    .about-section {
        padding: 110px 0 100px;
        background: #fff;
    }

    .about-content {
        max-width: 900px;
        margin: auto;
    }

    .about-title {
        color: #172033;
        font-weight: 800;
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1.2;
        margin-top: 12px;
        margin-bottom: 22px;
    }

    .about-text {
        color: #667085;
        line-height: 1.9;
        font-size: 16px;
        margin-bottom: 15px;
    }

    .about-button {
        padding: 12px 21px;
        border-radius: 11px;
        font-weight: 700;
        margin-top: 12px;
    }

    /* ==========================================
       CTA
    ========================================== */

    .cta-section {
        padding: 100px 0;
        background: #f8fafc;
    }

    .cta-box {
        position: relative;
        overflow: hidden;
        border-radius: 26px;
        padding: 65px 40px;
        text-align: center;
        background:
            radial-gradient(
                circle at top right,
                rgba(255,255,255,.13),
                transparent 30%
            ),
            linear-gradient(
                135deg,
                #0d6efd,
                #084298
            );
        color: #fff;
        box-shadow: 0 20px 55px rgba(13, 110, 253, .18);
    }

    .cta-box::before {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        border: 45px solid rgba(255,255,255,.06);
        top: -170px;
        left: -80px;
    }

    .cta-box::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border-radius: 50%;
        border: 35px solid rgba(255,255,255,.05);
        bottom: -140px;
        right: -60px;
    }

    .cta-content {
        position: relative;
        z-index: 2;
    }

    .cta-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;
        background: rgba(255,255,255,.12);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        margin: 0 auto 20px;
    }

    .cta-title {
        font-size: clamp(27px, 4vw, 38px);
        font-weight: 800;
        margin-bottom: 15px;
    }

    .cta-description {
        max-width: 650px;
        margin: 0 auto 28px;
        color: rgba(255,255,255,.82);
        line-height: 1.8;
    }

    .cta-button {
        background: #fff;
        color: #0d6efd;
        border: 0;
        padding: 13px 24px;
        border-radius: 11px;
        font-weight: 800;
        transition: all .25s ease;
    }

    .cta-button:hover {
        background: #f8f9fa;
        color: #084298;
        transform: translateY(-2px);
    }

    /* ==========================================
       RESPONSIVE
    ========================================== */

    @media (max-width: 991px) {

        .hero-section {
            min-height: auto;
            padding: 80px 0 100px;
        }

        .hero-visual {
            margin-top: 55px;
        }

        .hero-circle {
            width: 360px;
            height: 360px;
        }

        .hero-logo-box {
            width: 230px;
            height: 230px;
        }

        .quick-info {
            margin-top: -35px;
        }

        .about-section {
            padding: 80px 0;
        }
    }

    @media (max-width: 767px) {

        .hero-section {
            padding: 60px 0 80px;
        }

        .hero-title {
            font-size: 39px;
        }

        .hero-description {
            font-size: 15px;
            line-height: 1.75;
        }

        .hero-buttons {
            width: 100%;
        }

        .hero-btn {
            width: 100%;
        }

        .hero-circle {
            width: 290px;
            height: 290px;
        }

        .hero-circle::before {
            inset: 20px;
        }

        .hero-logo-box {
            width: 185px;
            height: 185px;
            border-radius: 28px;
            padding: 25px;
        }

        .floating-badge {
            font-size: 10px;
            padding: 8px 10px;
        }

        .floating-badge i {
            width: 25px;
            height: 25px;
        }

        .badge-one {
            left: -10px;
            top: 40px;
        }

        .badge-two {
            right: -10px;
            bottom: 40px;
        }

        .quick-info {
            margin-top: -25px;
        }

        .quick-info-card {
            padding: 20px;
        }

        .quick-item {
            margin-bottom: 18px;
        }

        .quick-item:last-child {
            margin-bottom: 0;
        }

        .about-section {
            padding: 70px 0;
        }

        .cta-section {
            padding: 70px 0;
        }

        .cta-box {
            padding: 50px 25px;
            border-radius: 20px;
        }
    }
</style>


<div class="home-page">


    {{-- ==========================================
         HERO
=========================================== --}}

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            {{-- HERO CONTENT --}}
            <div class="col-lg-7">
                <div class="hero-content">

                    <div class="hero-badge">
                        <i class="bi bi-building-check"></i>
                        BALAI LATIHAN KERJA KABUPATEN INDRAMAYU
                    </div>

                    <h1 class="hero-title">
                        Asah Keterampilan
                        <span class="highlight">
                            Bangun Masa Depan
                        </span>
                    </h1>

                    <p class="hero-description">
                        Tingkatkan kompetensi dan keterampilan Anda melalui
                        pelatihan kerja berbasis kompetensi di BLK Kabupaten
                        Indramayu untuk menjadi tenaga kerja yang terampil,
                        produktif, dan siap bersaing.
                    </p>

                    <div class="hero-buttons">

                        <a
                            href="{{ url('/profil') }}"
                            class="btn btn-primary hero-btn"
                        >
                            Mengenal BLK
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                        <a
                            href="{{ url('/kategori') }}"
                            class="btn btn-outline-primary hero-btn"
                        >
                            <i class="bi bi-grid-3x3-gap me-2"></i>
                            Lihat Pelatihan
                        </a>

                    </div>

                </div>
            </div>

            
{{-- HERO VISUAL --}}
<div class="col-lg-5">

    <div class="hero-visual">

        <div class="hero-circle">

            {{-- LOGO --}}
            <div class="hero-logo-box">
                <img
                    src="{{ asset('assets/image/logo.png') }}"
                    alt="Logo BLK Kabupaten Indramayu"
                >
            </div>

            {{-- BADGE 1 --}}
            <div class="floating-badge badge-one floating-up-down">
                <i class="bi bi-award-fill"></i>

                <span>
                    Pelatihan<br>
                    Berbasis Kompetensi
                </span>
            </div>

            {{-- BADGE 2 --}}
            <div class="floating-badge badge-two floating-up-down">
                <i class="bi bi-people-fill"></i>

                <span>
                    Meningkatkan<br>
                    Kompetensi SDM
                </span>
            </div>

        </div>

    </div>

</div>
    </section>


    {{-- ==========================================
         QUICK INFORMATION
    =========================================== --}}
    <section class="quick-info">

        <div class="container">

            <div class="quick-info-card">

                <div class="row g-4">

                    <div class="col-md-4">

                        <div class="quick-item">

                            <div class="quick-icon">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>

                            <div>
                                <h6>
                                    Pelatihan Kompetensi
                                </h6>

                                <p>
                                    Program pelatihan untuk meningkatkan
                                    keterampilan peserta.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="quick-item">

                            <div class="quick-icon">
                                <i class="bi bi-tools"></i>
                            </div>

                            <div>
                                <h6>
                                    Keterampilan Kerja
                                </h6>

                                <p>
                                    Membekali masyarakat dengan keterampilan
                                    sesuai kebutuhan dunia kerja.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="quick-item">

                            <div class="quick-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>

                            <div>
                                <h6>
                                    Daya Saing SDM
                                </h6>

                                <p>
                                    Mendorong produktivitas dan kemandirian
                                    masyarakat.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ==========================================
         TENTANG BLK
    =========================================== --}}
    <section class="about-section">

        <div class="container">

            <div class="about-content text-center">

                <div class="section-label">
                    Tentang BLK
                </div>

                <h2 class="about-title">
                    Balai Latihan Kerja Kabupaten Indramayu
                </h2>

                <p class="about-text">
                    Balai Latihan Kerja (BLK) Kabupaten Indramayu
                    merupakan lembaga yang menyelenggarakan berbagai
                    program pelatihan kerja untuk meningkatkan kualitas
                    sumber daya manusia.
                </p>

                <p class="about-text">
                    Melalui pelatihan berbasis kompetensi, BLK membantu
                    masyarakat memperoleh keterampilan yang sesuai dengan
                    kebutuhan dunia kerja, dunia usaha, dan dunia industri,
                    serta mendukung pengembangan kemandirian dan
                    kewirausahaan.
                </p>

                <a
                    href="{{ url('/profil') }}"
                    class="btn btn-outline-primary about-button"
                >
                    Selengkapnya Tentang BLK
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>

    </section>


    {{-- ==========================================
         CTA
    =========================================== --}}
    <section class="cta-section">

        <div class="container">

            <div class="cta-box">

                <div class="cta-content">

                    <div class="cta-icon">
                        <i class="bi bi-rocket-takeoff-fill"></i>
                    </div>

                    <h3 class="cta-title">
                        Siap Mengembangkan Kompetensi?
                    </h3>

                    <p class="cta-description">
                        Jelajahi berbagai program pelatihan yang tersedia
                        di Balai Latihan Kerja Kabupaten Indramayu dan
                        temukan kesempatan untuk meningkatkan keterampilan
                        serta kesiapan memasuki dunia kerja.
                    </p>

                    <a
                        href="{{ url('/kategori') }}"
                        class="btn cta-button"
                    >
                        Lihat Program Pelatihan
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>


</div>


@include('dashboard.footer')

@endsection