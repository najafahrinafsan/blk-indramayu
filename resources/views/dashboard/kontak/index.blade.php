@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

@include('dashboard.navbar')

<style>
    .contact-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 55%, #084298 100%);
    }

    .contact-hero::before,
    .contact-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }

    .contact-hero::before {
        width: 280px;
        height: 280px;
        top: -120px;
        right: -70px;
    }

    .contact-hero::after {
        width: 220px;
        height: 220px;
        bottom: -120px;
        left: -70px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .section-label {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 50px;
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }

    .contact-card {
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 18px;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .contact-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.10) !important;
    }

    .contact-icon {
        width: 68px;
        height: 68px;
        margin: 0 auto;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.7rem;
    }

    .contact-info-text {
        line-height: 1.8;
        font-size: 0.95rem;
    }

    .map-card {
        border-radius: 20px;
        overflow: hidden;
        background: white;
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .map-header {
        padding: 18px 22px;
        background: white;
        border-bottom: 1px solid #eee;
    }

    .map-container {
        overflow: hidden;
    }

    .map-container iframe {
        display: block;
    }

    .form-card {
        border: 0;
        border-radius: 20px;
        background: white;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
    }

    .form-card .card-body {
        padding: 32px;
    }

    .form-label {
        font-weight: 600;
        color: #212529;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #dee2e6;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.12);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        z-index: 2;
    }

    .input-icon .form-control {
        padding-left: 43px;
    }

    .textarea-icon {
        position: relative;
    }

    .textarea-icon i {
        position: absolute;
        left: 15px;
        top: 16px;
        color: #6c757d;
        z-index: 2;
    }

    .textarea-icon textarea {
        padding-left: 43px;
    }

    .btn-send {
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .btn-send:hover {
        transform: translateY(-2px);
    }

    .alert {
        border-radius: 14px;
        border: 0;
    }

    .social-section {
        background: #f8f9fa;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .social-btn {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: white;
        font-size: 1.35rem;
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        color: white;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .social-facebook {
        background: #1877f2;
    }

    .social-instagram {
        background: #e4405f;
    }

    .social-youtube {
        background: #ff0000;
    }

    .contact-title-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        margin-right: 10px;
    }

    .required {
        color: #dc3545;
    }

    @media (max-width: 767.98px) {
        .contact-hero h1 {
            font-size: 2rem;
        }

        .contact-hero p {
            font-size: 1rem;
        }

        .form-card .card-body {
            padding: 22px;
        }

        .map-container iframe {
            height: 350px;
        }
    }
</style>


{{-- ========================================================= --}}
{{-- HERO --}}
{{-- ========================================================= --}}

<section class="contact-hero text-white py-5">

    <div class="container py-4">

        <div class="hero-content text-center">

            <div class="mb-3">
                <span class="badge bg-light text-primary px-3 py-2 rounded-pill fw-semibold">
                    <i class="bi bi-headset me-1"></i>
                    LAYANAN INFORMASI
                </span>
            </div>

            <h1 class="fw-bold display-5 mb-3">
                Kontak Kami
            </h1>

            <p class="lead mb-0 mx-auto"
               style="max-width: 800px;">

                Hubungi Balai Latihan Kerja Kabupaten Indramayu
                untuk memperoleh informasi lebih lanjut mengenai
                program dan layanan pelatihan.

            </p>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- INFORMASI KONTAK --}}
{{-- ========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-label">
                INFORMASI KONTAK
            </span>

            <h2 class="fw-bold text-primary mb-2">
                Kami Siap Membantu Anda
            </h2>

            <p class="text-muted mx-auto mb-0"
               style="max-width: 700px;">

                Silakan hubungi kami melalui informasi kontak
                berikut untuk mendapatkan informasi mengenai
                program pelatihan BLK Kabupaten Indramayu.

            </p>

        </div>


        <div class="row g-4">

            {{-- ALAMAT --}}
            <div class="col-md-6 col-lg-3">

                <div class="card contact-card shadow-sm h-100">

                    <div class="card-body text-center p-4">

                        <div class="contact-icon bg-primary">

                            <i class="bi bi-geo-alt-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4 mb-3">
                            Alamat
                        </h5>

                        <p class="text-muted contact-info-text mb-0">

                            Jl. Jend. Gatot Subroto No. 1
                            <br>

                            Kabupaten Indramayu
                            <br>

                            Jawa Barat, Indonesia

                        </p>

                    </div>

                </div>

            </div>


            {{-- TELEPON --}}
            <div class="col-md-6 col-lg-3">

                <div class="card contact-card shadow-sm h-100">

                    <div class="card-body text-center p-4">

                        <div class="contact-icon bg-success">

                            <i class="bi bi-telephone-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4 mb-3">
                            Telepon
                        </h5>

                        <p class="text-muted contact-info-text mb-0">

                            0896-9823-0800
                            <br>

                            Senin - Jumat
                            <br>

                            08.00 - 15.00 WIB

                        </p>

                    </div>

                </div>

            </div>


            {{-- EMAIL --}}
            <div class="col-md-6 col-lg-3">

                <div class="card contact-card shadow-sm h-100">

                    <div class="card-body text-center p-4">

                        <div class="contact-icon bg-danger">

                            <i class="bi bi-envelope-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4 mb-3">
                            Email
                        </h5>

                        <p class="text-muted contact-info-text mb-0">

                            upt.blk.imy@gmail.com
                            <br>

                            Pertanyaan & Informasi

                        </p>

                    </div>

                </div>

            </div>


            {{-- JAM OPERASIONAL --}}
            <div class="col-md-6 col-lg-3">

                <div class="card contact-card shadow-sm h-100">

                    <div class="card-body text-center p-4">

                        <div class="contact-icon bg-warning text-dark">

                            <i class="bi bi-clock-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4 mb-3">
                            Jam Operasional
                        </h5>

                        <p class="text-muted contact-info-text mb-0">

                            Senin - Jumat
                            <br>

                            08.00 - 16.00 WIB
                            <br>

                            Sabtu & Minggu Libur

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- LOKASI + FORM KONTAK --}}
{{-- ========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-5 align-items-start">


            {{-- GOOGLE MAPS --}}
            <div class="col-lg-7">

                <div class="mb-4">

                    <div class="d-flex align-items-center mb-2">

                        <span class="contact-title-icon">

                            <i class="bi bi-geo-alt-fill"></i>

                        </span>

                        <h2 class="fw-bold text-primary mb-0">
                            Lokasi Kami
                        </h2>

                    </div>

                    <p class="text-muted mb-0">

                        Anda dapat melihat lokasi Balai Latihan Kerja
                        Kabupaten Indramayu melalui peta berikut.

                    </p>

                </div>


                <div class="map-card shadow-sm">

                    <div class="map-header">

                        <div class="d-flex align-items-center">

                            <i class="bi bi-map text-primary fs-5 me-2"></i>

                            <span class="fw-semibold">
                                BLK Kabupaten Indramayu
                            </span>

                        </div>

                    </div>

                    <div class="map-container">

                        <iframe
                            src="https://www.google.com/maps?q=Jl.%20Jend.%20Gatot%20Subroto%20No.%201,%20Indramayu&output=embed"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>

                </div>

            </div>


            {{-- FORM KIRIM PESAN --}}
            <div class="col-lg-5">

                <div class="card form-card">

                    <div class="card-body">

                        <div class="mb-4">

                            <div class="d-flex align-items-center mb-2">

                                <span class="contact-title-icon">

                                    <i class="bi bi-chat-dots-fill"></i>

                                </span>

                                <h2 class="fw-bold text-primary mb-0">
                                    Kirim Pesan
                                </h2>

                            </div>

                            <p class="text-muted mb-0">

                                Silakan isi formulir berikut.
                                Pesan Anda akan diterima oleh admin
                                BLK Kabupaten Indramayu.

                            </p>

                        </div>


                        {{-- SUCCESS --}}
                        @if(session('success'))

                            <div
                                class="alert alert-success alert-dismissible fade show mb-4"
                                role="alert">

                                <div class="d-flex align-items-start">

                                    <i class="bi bi-check-circle-fill fs-5 me-2"></i>

                                    <div>
                                        <strong>Berhasil!</strong>
                                        <br>
                                        {{ session('success') }}
                                    </div>

                                </div>

                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close">
                                </button>

                            </div>

                        @endif


                        {{-- ERROR --}}
                        @if($errors->any())

                            <div class="alert alert-danger mb-4">

                                <div class="fw-bold mb-2">

                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>

                                    Periksa kembali data Anda.

                                </div>

                                <ul class="mb-0 ps-3">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        {{-- FORM --}}
                        <form
                            action="{{ route('kontak.kirim') }}"
                            method="POST">

                            @csrf


                            {{-- NAMA --}}
                            <div class="mb-3">

                                <label
                                    for="nama"
                                    class="form-label">

                                    Nama Lengkap
                                    <span class="required">*</span>

                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-person-fill"></i>

                                    <input
                                        type="text"
                                        id="nama"
                                        name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}"
                                        placeholder="Masukkan nama lengkap"
                                        required>

                                </div>

                                @error('nama')

                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- EMAIL --}}
                            <div class="mb-3">

                                <label
                                    for="email"
                                    class="form-label">

                                    Email
                                    <span class="required">*</span>

                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-envelope-fill"></i>

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        placeholder="Masukkan alamat email"
                                        required>

                                </div>

                                @error('email')

                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- NOMOR HP --}}
                            <div class="mb-3">

                                <label
                                    for="no_hp"
                                    class="form-label">

                                    Nomor HP

                                    <span class="text-muted fw-normal">
                                        (Opsional)
                                    </span>

                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-phone-fill"></i>

                                    <input
                                        type="text"
                                        id="no_hp"
                                        name="no_hp"
                                        class="form-control @error('no_hp') is-invalid @enderror"
                                        value="{{ old('no_hp') }}"
                                        placeholder="Contoh: 081234567890">

                                </div>

                                @error('no_hp')

                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- SUBJEK --}}
                            <div class="mb-3">

                                <label
                                    for="subjek"
                                    class="form-label">

                                    Subjek
                                    <span class="required">*</span>

                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-chat-left-text-fill"></i>

                                    <input
                                        type="text"
                                        id="subjek"
                                        name="subjek"
                                        class="form-control @error('subjek') is-invalid @enderror"
                                        value="{{ old('subjek') }}"
                                        placeholder="Masukkan subjek pesan"
                                        required>

                                </div>

                                @error('subjek')

                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- PESAN --}}
                            <div class="mb-4">

                                <label
                                    for="pesan"
                                    class="form-label">

                                    Pesan
                                    <span class="required">*</span>

                                </label>

                                <div class="textarea-icon">

                                    <i class="bi bi-pencil-fill"></i>

                                    <textarea
                                        id="pesan"
                                        name="pesan"
                                        rows="6"
                                        class="form-control @error('pesan') is-invalid @enderror"
                                        placeholder="Tulis pesan Anda..."
                                        required>{{ old('pesan') }}</textarea>

                                </div>

                                @error('pesan')

                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- BUTTON --}}
                            <button
                                type="submit"
                                class="btn btn-primary btn-send w-100">

                                <i class="bi bi-send-fill me-2"></i>

                                Kirim Pesan

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- MEDIA SOSIAL --}}
{{-- ========================================================= --}}

<section class="py-5 social-section">

    <div class="container text-center">

        <span class="section-label">
            MEDIA SOSIAL
        </span>

        <h2 class="fw-bold text-primary mb-2">
            Ikuti Kami
        </h2>

        <p class="text-muted mx-auto mb-4"
           style="max-width: 700px;">

            Dapatkan informasi terbaru mengenai kegiatan
            dan program pelatihan BLK Kabupaten Indramayu
            melalui media sosial kami.

        </p>


        <div class="social-links">

            {{-- FACEBOOK --}}
            <a
                href="https://www.facebook.com/share/19G1EQxMgR/"
                class="social-btn social-facebook"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Facebook BLK Kabupaten Indramayu">

                <i class="bi bi-facebook"></i>

            </a>


            {{-- INSTAGRAM --}}
            <a
                href="https://www.instagram.com/imyblk?igsh=NGU4aGk5NjEzY2dj"
                class="social-btn social-instagram"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Instagram BLK Kabupaten Indramayu">

                <i class="bi bi-instagram"></i>

            </a>


            {{-- YOUTUBE --}}
            <a
                href="https://youtube.com/@blkindramayu?si=ycyoRDSfHmK3EsQ8"
                class="social-btn social-youtube"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="YouTube BLK Kabupaten Indramayu">

                <i class="bi bi-youtube"></i>

            </a>

        </div>

    </div>

</section>


@include('dashboard.footer')

@endsection