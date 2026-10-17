<nav class="navbar navbar-expand-lg navbar-dark navbar-blk sticky-top">

    <div class="container">

        {{-- =========================
             LOGO / BRAND
        ========================== --}}
        <a
            class="navbar-brand d-flex align-items-center"
            href="{{ url('/') }}"
        >

            <div class="brand-logo">
                <img
                    src="{{ asset('assets/image/logo.png') }}"
                    alt="Logo BLK Kabupaten Indramayu"
                >
            </div>

            <div class="brand-text">
                <span class="brand-title">
                    BLK Kabupaten Indramayu
                </span>

                <span class="brand-subtitle">
                    Balai Latihan Kerja
                </span>
            </div>

        </a>


        {{-- =========================
             MOBILE BUTTON
        ========================== --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarBLK"
            aria-controls="navbarBLK"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>


        {{-- =========================
             NAVIGATION
        ========================== --}}
        <div
            class="collapse navbar-collapse"
            id="navbarBLK"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">


                {{-- BERANDA --}}
                <li class="nav-item">

                    <a
                        class="nav-link nav-link-blk"
                        href="{{ url('/') }}"
                    >
                        <i class="bi bi-house-door-fill me-1"></i>
                        Beranda
                    </a>

                </li>


                {{-- =========================
                     TENTANG KAMI
                ========================== --}}
                <li class="nav-item dropdown">

                    <a
                        class="nav-link nav-link-blk dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Tentang Kami
                    </a>

                    <ul class="dropdown-menu dropdown-menu-blk">

                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ url('/profil') }}"
                            >
                                <span class="dropdown-icon">
                                    <i class="bi bi-building"></i>
                                </span>

                                <span>
                                    <strong>Profil BLK</strong>
                                    <small>Tentang BLK Indramayu</small>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ url('/tugas') }}"
                            >
                                <span class="dropdown-icon">
                                    <i class="bi bi-journal-text"></i>
                                </span>

                                <span>
                                    <strong>Tugas Pokok & Fungsi</strong>
                                    <small>Tugas dan fungsi BLK</small>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ url('/struktur') }}"
                            >
                                <span class="dropdown-icon">
                                    <i class="bi bi-diagram-3"></i>
                                </span>

                                <span>
                                    <strong>Struktur Organisasi</strong>
                                    <small>Struktur organisasi BLK</small>
                                </span>
                            </a>
                        </li>

                    </ul>

                </li>


                {{-- =========================
                     PROGRAM PELATIHAN
                ========================== --}}
                <li class="nav-item dropdown">

                    <a
                        class="nav-link nav-link-blk dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Program Pelatihan
                    </a>

                    <ul class="dropdown-menu dropdown-menu-blk">

                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ url('/kategori') }}"
                            >
                                <span class="dropdown-icon">
                                    <i class="bi bi-grid-3x3-gap-fill"></i>
                                </span>

                                <span>
                                    <strong>Kategori Pelatihan</strong>
                                    <small>Pilihan program pelatihan</small>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ url('/persyaratan') }}"
                            >
                                <span class="dropdown-icon">
                                    <i class="bi bi-clipboard-check"></i>
                                </span>

                                <span>
                                    <strong>Persyaratan Peserta</strong>
                                    <small>Syarat mengikuti pelatihan</small>
                                </span>
                            </a>
                        </li>

                    </ul>

                </li>


                {{-- =========================
                INFORMASI
            ========================== --}}
            <li class="nav-item dropdown">

                <a
                    class="nav-link nav-link-blk dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    Informasi
                </a>

                <ul class="dropdown-menu dropdown-menu-blk">

                    {{-- Galeri --}}
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{ url('/galeri') }}"
                        >
                            <span class="dropdown-icon">
                                <i class="bi bi-images"></i>
                            </span>

                            <span>
                                <strong>Galeri Kegiatan</strong>
                                <small>Dokumentasi kegiatan BLK</small>
                            </span>
                        </a>
                    </li>

                    {{-- Testimoni --}}
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{ url('/testimoni') }}"
                        >
                            <span class="dropdown-icon">
                                <i class="bi bi-chat-quote"></i>
                            </span>

                            <span>
                                <strong>Testimoni Alumni</strong>
                                <small>Pengalaman alumni BLK</small>
                            </span>
                        </a>
                    </li>

                    {{-- Survei Kepekerjaan --}}
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{ route('survei.kepekerjaan') }}"
                        >
                            <span class="dropdown-icon">
                                <i class="bi bi-briefcase"></i>
                            </span>

                            <span>
                                <strong>Survei Kepekerjaan</strong>
                                <small>Survei kepekerjaan alumni</small>
                            </span>
                        </a>
                    </li>

                    {{-- Pengumuman --}}
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{ url('/pengumuman') }}"
                        >
                            <span class="dropdown-icon">
                                <i class="bi bi-megaphone"></i>
                            </span>

                            <span>
                                <strong>Pengumuman</strong>
                                <small>Informasi terbaru BLK</small>
                            </span>
                        </a>
                    </li>

                </ul>
            </li>


                {{-- KONTAK --}}
                <li class="nav-item">

                    <a
                        class="nav-link nav-link-blk"
                        href="{{ url('/kontak') }}"
                    >
                        Kontak Kami
                    </a>

                </li>


                {{-- =========================
                     LOGIN ADMIN
                ========================== --}}
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">

                    <a
                        href="{{ url('/admin/login') }}"
                        class="btn btn-login-admin"
                    >
                        <i class="bi bi-person-lock me-1"></i>
                        Login Admin
                    </a>

                </li>


                {{-- =========================
                     DAFTAR PELATIHAN
                ========================== --}}
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">

                    <a
                        href="{{ route('pelatihan') }}"
                        class="btn btn-register"
                    >
                        <i class="bi bi-mortarboard-fill me-1"></i>
                        Daftar Pelatihan
                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


<style>

    /* ==========================================
       NAVBAR
    ========================================== */

    .navbar-blk {
        background:
            linear-gradient(
                135deg,
                #0d6efd 0%,
                #0a58ca 55%,
                #084298 100%
            );

        padding: 10px 0;
        box-shadow:
            0 8px 25px rgba(15, 23, 42, .12);

        z-index: 1030;
    }


    /* ==========================================
       BRAND
    ========================================== */

    .navbar-brand {
        gap: 12px;
        margin-right: 30px;
    }

    .brand-logo {
        width: 48px;
        height: 48px;
        border-radius: 13px;

        background: rgba(255,255,255,.12);

        border: 1px solid rgba(255,255,255,.20);

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 5px;

        backdrop-filter: blur(8px);
    }

    .brand-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .brand-text {
        display: flex;
        flex-direction: column;
        line-height: 1.15;
    }

    .brand-title {
        font-size: 15px;
        font-weight: 800;
        color: #fff;
        white-space: nowrap;
    }

    .brand-subtitle {
        font-size: 10px;
        color: rgba(255,255,255,.70);
        margin-top: 3px;
        letter-spacing: .04em;
    }


    /* ==========================================
       NAV LINK
    ========================================== */

    .nav-link-blk {
        color: rgba(255,255,255,.88) !important;

        font-size: 13px;
        font-weight: 600;

        padding: 10px 12px !important;

        border-radius: 9px;

        transition:
            background .2s ease,
            color .2s ease,
            transform .2s ease;
    }

    .nav-link-blk:hover {
        color: #fff !important;

        background: rgba(255,255,255,.11);

        transform: translateY(-1px);
    }

    .nav-link-blk.show {
        color: #fff !important;
        background: rgba(255,255,255,.12);
    }


    /* ==========================================
       DROPDOWN
    ========================================== */

    .dropdown-menu-blk {
        min-width: 285px;

        padding: 9px;

        margin-top: 10px !important;

        border: 1px solid #edf1f5;

        border-radius: 15px;

        background: #fff;

        box-shadow:
            0 18px 45px rgba(15,23,42,.14);

        animation: dropdownShow .18s ease;
    }

    @keyframes dropdownShow {

        from {
            opacity: 0;
            transform: translateY(7px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 11px 10px;

        border-radius: 10px;

        color: #344054;

        transition:
            background .2s ease,
            transform .2s ease;
    }

    .dropdown-item:hover {
        background: #f3f7ff;
        color: #0d6efd;

        transform: translateX(2px);
    }

    .dropdown-item strong {
        display: block;

        font-size: 13px;
        font-weight: 700;

        margin-bottom: 2px;
    }

    .dropdown-item small {
        display: block;

        font-size: 11px;
        color: #98a2b3;
    }

    .dropdown-icon {
        width: 38px;
        height: 38px;

        flex-shrink: 0;

        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: rgba(13,110,253,.08);

        color: #0d6efd;

        font-size: 16px;
    }


    /* ==========================================
       LOGIN ADMIN
    ========================================== */

    .btn-login-admin {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 9px 14px;

        border-radius: 9px;

        background: rgba(255,255,255,.10);

        border: 1px solid rgba(255,255,255,.30);

        color: #fff !important;

        font-size: 12px;
        font-weight: 700;

        transition: all .2s ease;
    }

    .btn-login-admin:hover {
        background: #fff;

        color: #0d6efd !important;

        transform: translateY(-1px);

        box-shadow:
            0 6px 15px rgba(0,0,0,.12);
    }


    /* ==========================================
       DAFTAR PELATIHAN
    ========================================== */

    .btn-register {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 9px 15px;

        border-radius: 9px;

        background: #ffc107;

        border: 1px solid #ffc107;

        color: #172033 !important;

        font-size: 12px;
        font-weight: 800;

        transition: all .2s ease;

        box-shadow:
            0 5px 15px rgba(0,0,0,.10);
    }

    .btn-register:hover {
        background: #ffca2c;

        border-color: #ffca2c;

        transform: translateY(-1px);

        box-shadow:
            0 8px 18px rgba(0,0,0,.15);
    }


    /* ==========================================
       MOBILE
    ========================================== */

    .navbar-toggler {
        border: 1px solid rgba(255,255,255,.25);

        border-radius: 10px;

        padding: 8px 10px;
    }

    .navbar-toggler:focus {
        box-shadow:
            0 0 0 3px rgba(255,255,255,.12);
    }


    @media (max-width: 991px) {

        .navbar-blk {
            padding: 9px 0;
        }

        .navbar-collapse {
            margin-top: 12px;

            padding: 10px;

            border-radius: 15px;

            background: rgba(0,0,0,.10);
        }

        .navbar-nav {
            align-items: stretch !important;
        }

        .nav-link-blk {
            padding: 11px 13px !important;
        }

        .dropdown-menu-blk {
            margin-top: 4px !important;

            min-width: 100%;

            border-radius: 12px;
        }

        .nav-item.ms-lg-2 {
            margin-left: 0 !important;
        }

        .btn-login-admin,
        .btn-register {
            width: 100%;

            margin-top: 5px;
            padding: 11px;
        }

    }


    @media (max-width: 575px) {

        .brand-title {
            font-size: 13px;
        }

        .brand-subtitle {
            font-size: 9px;
        }

        .brand-logo {
            width: 43px;
            height: 43px;
        }

        .navbar-brand {
            gap: 9px;
            margin-right: 10px;
        }

    }

</style>