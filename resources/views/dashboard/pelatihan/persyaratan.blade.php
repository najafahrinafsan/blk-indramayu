@extends('layouts.app')

@section('title', 'Persyaratan Peserta')

@section('content')

@include('dashboard.navbar')

<style>
    /* ==========================================
       HALAMAN PERSYARATAN PESERTA
    ========================================== */

    .requirement-page {
        background: #f5f7fb;
        min-height: 100vh;
    }

    /* ==========================================
       HEADER
    ========================================== */

    .requirement-header {
        background: linear-gradient(
            135deg,
            #0d6efd,
            #0b5ed7
        );
        color: white;
        padding: 70px 20px;
        text-align: center;
    }

    .requirement-header h1 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .requirement-header p {
        max-width: 800px;
        margin: auto;
        font-size: 18px;
        line-height: 1.7;
        opacity: 0.95;
    }

    /* ==========================================
       CONTENT
    ========================================== */

    .requirement-content {
        padding: 60px 0;
    }

    .requirement-card {
        background: #ffffff;
        border: none;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
    }

    .requirement-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.10);
    }

    /* ==========================================
       JUDUL CARD
    ========================================== */

    .requirement-title {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
    }

    .requirement-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 12px;
        background: #eaf2ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .requirement-title h2 {
        margin: 0;
        color: #0d6efd;
        font-size: 24px;
        font-weight: 700;
    }

    /* ==========================================
       LIST
    ========================================== */

    .requirement-list {
        margin: 0;
        padding-left: 25px;
    }

    .requirement-list li {
        padding: 7px 0;
        line-height: 1.7;
        color: #555;
    }

    /* ==========================================
       INFO
    ========================================== */

    .requirement-info {
        background: #eff6ff;
        border-left: 5px solid #0d6efd;
        padding: 18px 20px;
        margin-top: 25px;
        border-radius: 8px;
        color: #495057;
        line-height: 1.7;
    }

    .requirement-info strong {
        color: #0d6efd;
    }

    /* ==========================================
       BUTTON
    ========================================== */

    .requirement-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 30px;
    }

    .btn-requirement {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 12px 22px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-program {
        background: #0d6efd;
        color: white;
    }

    .btn-program:hover {
        background: #0b5ed7;
        color: white;
        transform: translateY(-2px);
    }

    .btn-back {
        background: white;
        color: #0d6efd;
        border: 1px solid #0d6efd;
    }

    .btn-back:hover {
        background: #0d6efd;
        color: white;
        transform: translateY(-2px);
    }

    /* ==========================================
       RESPONSIVE - TABLET
    ========================================== */

    @media (max-width: 991px) {

        .requirement-header {
            padding: 55px 20px;
        }

        .requirement-header h1 {
            font-size: 36px;
        }

        .requirement-header p {
            font-size: 17px;
        }

        .requirement-content {
            padding: 45px 0;
        }
    }

    /* ==========================================
       RESPONSIVE - HP
    ========================================== */

    @media (max-width: 767px) {

        .requirement-header {
            padding: 45px 18px;
        }

        .requirement-header h1 {
            font-size: 30px;
        }

        .requirement-header p {
            font-size: 15px;
            line-height: 1.6;
        }

        .requirement-content {
            padding: 35px 15px;
        }

        .requirement-card {
            padding: 22px 18px;
            border-radius: 13px;
        }

        .requirement-title {
            gap: 10px;
        }

        .requirement-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            font-size: 19px;
        }

        .requirement-title h2 {
            font-size: 20px;
        }

        .requirement-list {
            padding-left: 22px;
        }

        .requirement-list li {
            font-size: 14px;
            line-height: 1.6;
            padding: 6px 0;
        }

        .requirement-info {
            font-size: 14px;
            padding: 15px;
        }

        .requirement-actions {
            flex-direction: column;
        }

        .btn-requirement {
            width: 100%;
        }
    }
</style>


<div class="requirement-page">

    <!-- ==========================================
         HEADER
    ========================================== -->

    <section class="requirement-header">

        <div class="container">

            <h1>
                Persyaratan Peserta
            </h1>

            <p>
                Berikut adalah persyaratan umum bagi masyarakat yang ingin
                mengikuti program pelatihan di Balai Latihan Kerja
                Kabupaten Indramayu.
            </p>

        </div>

    </section>


    <!-- ==========================================
         CONTENT
    ========================================== -->

    <section class="requirement-content">

        <div class="container">

            <!-- ======================================
                 PERSYARATAN UMUM
            ======================================= -->

            <div class="requirement-card">

                <div class="requirement-title">

                    <div class="requirement-icon">
                        <i class="bi bi-person-check-fill"></i>
                    </div>

                    <h2>
                        Persyaratan Umum
                    </h2>

                </div>

                <ul class="requirement-list">

                    <li>
                        Warga Negara Indonesia.
                    </li>

                    <li>
                        Memiliki identitas diri yang masih berlaku.
                    </li>

                    <li>
                        Memenuhi usia sesuai dengan persyaratan program pelatihan.
                    </li>

                    <li>
                        Memiliki minat untuk mengikuti pelatihan.
                    </li>

                    <li>
                        Mengikuti seluruh proses seleksi yang ditentukan.
                    </li>

                    <li>
                        Bersedia mengikuti pelatihan sampai selesai.
                    </li>

                </ul>

            </div>


            <!-- ======================================
                 DOKUMEN
            ======================================= -->

            <div class="requirement-card">

                <div class="requirement-title">

                    <div class="requirement-icon">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>

                    <h2>
                        Dokumen yang Dibutuhkan
                    </h2>

                </div>

                <ul class="requirement-list">

                    <li>
                        Fotocopy Kartu Tanda Penduduk (KTP), 2 lembar.
                    </li>

                    <li>
                        Fotocopy Ijazah terakhir, 2 lembar.
                    </li>

                    <li>
                        Pas foto Bg.Merah ukuran 3x4, 4 Buah.
                    </li>

                    <li>
                        Surat Ket. Sehat dari Dokter/Puskesmas.
                    </li>

                </ul>

            </div>


            <!-- ======================================
                 KETENTUAN PENDAFTARAN
            ======================================= -->

            <div class="requirement-card">

                <div class="requirement-title">

                    <div class="requirement-icon">
                        <i class="bi bi-clipboard-check-fill"></i>
                    </div>

                    <h2>
                        Ketentuan Pendaftaran
                    </h2>

                </div>

                <ul class="requirement-list">

                    <li>
                        Peserta wajib mengisi data pendaftaran dengan benar.
                    </li>

                    <li>
                        Dokumen yang diunggah harus dapat dibaca dengan jelas.
                    </li>

                    <li>
                        Peserta hanya dapat mengikuti pelatihan sesuai ketentuan yang berlaku.
                    </li>

                    <li>
                        Peserta yang lolos seleksi wajib mengikuti pelatihan sesuai jadwal.
                    </li>

                </ul>


                <!-- INFO -->

                <div class="requirement-info">

                    <strong>
                        <i class="bi bi-info-circle-fill me-1"></i>
                        Catatan:
                    </strong>

                    Persyaratan dapat berbeda untuk setiap program pelatihan.
                    Silakan periksa detail persyaratan pada masing-masing program.

                </div>


                <!-- BUTTON -->

                <div class="requirement-actions">

                    <a href="{{ url('/pelatihan') }}"
                       class="btn-requirement btn-program">

                        Lihat Program Pelatihan

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </section>

</div>


@include('dashboard.footer')

@endsection