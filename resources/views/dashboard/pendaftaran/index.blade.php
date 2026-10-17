@extends('layouts.app')

@section('title', 'Pendaftaran Pelatihan')

@section('content')

@include('dashboard.navbar')

<style>
    body {
        background: #f5f7fb;
    }

    .registration-hero {
        position: relative;
        overflow: hidden;
        padding: 75px 0 115px;
        color: #fff;
        background:
            linear-gradient(135deg, rgba(13, 110, 253, .98), rgba(8, 66, 152, .98)),
            url('/images/bg-pattern.svg');
    }

    .registration-hero::before,
    .registration-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, .08);
        pointer-events: none;
    }

    .registration-hero::before {
        width: 350px;
        height: 350px;
        top: -180px;
        right: -100px;
    }

    .registration-hero::after {
        width: 260px;
        height: 260px;
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
        gap: 8px;
        padding: 8px 15px;
        margin-bottom: 18px;
        border: 1px solid rgba(255, 255, 255, .35);
        border-radius: 50px;
        background: rgba(255, 255, 255, .12);
        font-size: 13px;
        font-weight: 600;
    }

    .hero-title {
        font-size: clamp(2rem, 4vw, 3.2rem);
        font-weight: 800;
        letter-spacing: -.8px;
        margin-bottom: 18px;
    }

    .hero-description {
        max-width: 760px;
        margin: 0 auto 28px;
        font-size: 1.08rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, .9);
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 11px 20px;
        border: 1px solid rgba(255, 255, 255, .6);
        border-radius: 12px;
        color: #fff;
        background: rgba(255, 255, 255, .1);
        text-decoration: none;
        font-weight: 600;
        transition: all .25s ease;
    }

    .back-button:hover {
        color: #0d6efd;
        background: #fff;
        transform: translateY(-2px);
    }

    .registration-wrapper {
        position: relative;
        z-index: 5;
        margin-top: -70px;
        padding-bottom: 60px;
    }

    .registration-card {
        overflow: hidden;
        border: 0;
        border-radius: 24px;
        background: #fff;
        box-shadow: 0 18px 55px rgba(16, 24, 40, .12);
    }

    .registration-card-header {
        padding: 32px 38px;
        border-bottom: 1px solid #edf0f5;
        background: linear-gradient(180deg, #ffffff, #fbfcff);
    }

    .form-badge {
        display: inline-block;
        padding: 7px 13px;
        margin-bottom: 13px;
        border-radius: 8px;
        color: #0d6efd;
        background: #eaf2ff;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .5px;
    }

    .form-title {
        margin-bottom: 8px;
        color: #123b75;
        font-size: 1.8rem;
        font-weight: 800;
    }

    .form-subtitle {
        margin-bottom: 0;
        color: #667085;
    }

    .registration-card-body {
        padding: 35px 38px 40px;
    }

    .program-box {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 20px;
        margin-bottom: 30px;
        border: 1px solid #b8d4ff;
        border-radius: 16px;
        background: linear-gradient(135deg, #edf5ff, #dceaff);
    }

    .program-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 52px;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        color: #fff;
        background: #0d6efd;
        font-size: 24px;
    }

    .program-label {
        display: block;
        margin-bottom: 4px;
        color: #667085;
        font-size: 13px;
    }

    .program-name {
        color: #123b75;
        font-size: 1.15rem;
        font-weight: 800;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 12px;
        margin: 28px 0 22px;
        border-bottom: 1px solid #edf0f5;
        color: #123b75;
        font-size: 1.05rem;
        font-weight: 800;
    }

    .section-heading i {
        color: #0d6efd;
        font-size: 1.2rem;
    }

    .form-label {
        margin-bottom: 8px;
        color: #344054;
        font-size: 14px;
        font-weight: 700;
    }

    .form-control,
    .form-select {
        min-height: 49px;
        padding: 12px 15px;
        border: 1px solid #d0d5dd;
        border-radius: 11px;
        color: #344054;
        background-color: #fff;
        transition: all .2s ease;
    }

    textarea.form-control {
        min-height: 115px;
        resize: vertical;
    }

    .form-control::placeholder {
        color: #98a2b3;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, .1);
    }

    .required-mark {
        color: #dc3545;
    }

    .agreement-box {
        padding: 17px 18px;
        margin-top: 10px;
        border: 1px solid #e4e7ec;
        border-radius: 13px;
        background: #f9fafb;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        margin-top: 2px;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .form-check-label {
        padding-left: 7px;
        color: #475467;
        font-size: 14px;
        line-height: 1.7;
        cursor: pointer;
    }

    .submit-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-height: 54px;
        padding: 13px 28px;
        border: 0;
        border-radius: 12px;
        background: linear-gradient(135deg, #0d6efd, #084298);
        box-shadow: 0 8px 20px rgba(13, 110, 253, .22);
        font-weight: 700;
        transition: all .25s ease;
    }

    .submit-button:hover {
        background: linear-gradient(135deg, #084298, #062c65);
        box-shadow: 0 12px 25px rgba(13, 110, 253, .3);
        transform: translateY(-2px);
    }

    .alert {
        border: 0;
        border-radius: 14px;
    }

    @media (max-width: 767.98px) {
        .registration-hero {
            padding: 50px 0 100px;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-description {
            font-size: .95rem;
        }

        .registration-card-header,
        .registration-card-body {
            padding: 25px 20px;
        }

        .registration-card {
            border-radius: 18px;
        }

        .program-box {
            align-items: flex-start;
            padding: 16px;
        }

        .program-name {
            font-size: 1rem;
        }

        .submit-button {
            width: 100%;
        }
    }
</style>

{{-- NOTIFIKASI BERHASIL --}}
@if(session('success'))
    <div class="container mt-4">
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>

                <div>
                    <strong class="d-block mb-1">
                        Pendaftaran Berhasil!
                    </strong>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>

                <button type="button"
                        class="btn-close ms-auto"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        </div>
    </div>
@endif

{{-- NOTIFIKASI ERROR --}}
@if($errors->any())
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <div class="d-flex align-items-start">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>

                <div>
                    <strong class="d-block mb-1">
                        Data belum lengkap!
                    </strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <button type="button"
                        class="btn-close ms-auto"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        </div>
    </div>
@endif

{{-- HEADER --}}
<section class="registration-hero">
    <div class="container text-center hero-content">

        <div class="hero-badge">
            <i class="bi bi-mortarboard-fill"></i>
            Pendaftaran Peserta Pelatihan
        </div>

        <h1 class="hero-title">
            Pendaftaran Pelatihan
        </h1>

        <p class="hero-description">
            Daftarkan diri Anda untuk mengikuti program pelatihan
            di Balai Latihan Kerja Kabupaten Indramayu.
        </p>

        <a href="{{ url()->previous() }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>
</section>

{{-- FORM PENDAFTARAN --}}
<section class="registration-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">

                <div class="registration-card">

                    {{-- HEADER FORM --}}
                    <div class="registration-card-header">
                        <span class="form-badge">
                            FORMULIR PESERTA
                        </span>

                        <h2 class="form-title">
                            Formulir Pendaftaran
                        </h2>

                        <p class="form-subtitle">
                            Silakan isi data diri Anda dengan benar dan lengkap.
                        </p>
                    </div>

                    <div class="registration-card-body">

                        {{-- PROGRAM YANG DIPILIH --}}
                        <div class="program-box">
                            <div class="program-icon">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>

                            <div>
                                <span class="program-label">
                                    Program Pelatihan yang Dipilih
                                </span>

                                <div class="program-name">
                                    {{ $kategori->nama }}
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('pendaftaran.store') }}" method="POST">
                            @csrf

                            <input
                                type="hidden"
                                name="kategori_id"
                                value="{{ $kategori->id }}"
                            >

                            {{-- DATA PRIBADI --}}
                            <div class="section-heading">
                                <i class="bi bi-person-vcard-fill"></i>
                                Data Pribadi
                            </div>

                            {{-- NAMA LENGKAP --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Nama Lengkap <span class="required-mark">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="nama_lengkap"
                                    class="form-control"
                                    value="{{ old('nama_lengkap') }}"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >
                            </div>

                            {{-- NIK --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    NIK <span class="required-mark">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="nik"
                                    class="form-control"
                                    value="{{ old('nik') }}"
                                    maxlength="16"
                                    minlength="16"
                                    inputmode="numeric"
                                    placeholder="Masukkan 16 digit NIK"
                                    required
                                >
                            </div>

                            {{-- TEMPAT DAN TANGGAL LAHIR --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Tempat Lahir <span class="required-mark">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="tempat_lahir"
                                        class="form-control"
                                        value="{{ old('tempat_lahir') }}"
                                        placeholder="Contoh: Indramayu"
                                        required
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Tanggal Lahir <span class="required-mark">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal_lahir"
                                        class="form-control"
                                        value="{{ old('tanggal_lahir') }}"
                                        required
                                    >
                                </div>
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Jenis Kelamin <span class="required-mark">*</span>
                                </label>

                                <select
                                    name="jenis_kelamin"
                                    class="form-select"
                                    required
                                >
                                    <option value="">
                                        -- Pilih Jenis Kelamin --
                                    </option>

                                    <option
                                        value="Laki-laki"
                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}
                                    >
                                        Laki-laki
                                    </option>

                                    <option
                                        value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
                                    >
                                        Perempuan
                                    </option>
                                </select>
                            </div>

                            {{-- ALAMAT --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Alamat Lengkap <span class="required-mark">*</span>
                                </label>

                                <textarea
                                    name="alamat"
                                    rows="4"
                                    class="form-control"
                                    placeholder="Masukkan alamat lengkap"
                                    required
                                >{{ old('alamat') }}</textarea>
                            </div>

                            {{-- KONTAK --}}
                            <div class="section-heading">
                                <i class="bi bi-telephone-fill"></i>
                                Informasi Kontak
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Nomor HP / WhatsApp <span class="required-mark">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="no_hp"
                                        class="form-control"
                                        value="{{ old('no_hp') }}"
                                        inputmode="tel"
                                        placeholder="Contoh: 08123456789"
                                        required
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email') }}"
                                        placeholder="nama@email.com"
                                    >
                                </div>
                            </div>

                            {{-- PENDIDIKAN --}}
                            <div class="section-heading">
                                <i class="bi bi-book-fill"></i>
                                Pendidikan
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    Pendidikan Terakhir <span class="required-mark">*</span>
                                </label>

                                <select
                                    name="pendidikan_terakhir"
                                    class="form-select"
                                    required
                                >
                                    <option value="">
                                        -- Pilih Pendidikan --
                                    </option>

                                    @foreach([
                                        'SD',
                                        'SMP',
                                        'SMA / SMK',
                                        'Diploma',
                                        'S1',
                                        'S2',
                                        'Lainnya'
                                    ] as $pendidikan)

                                        <option
                                            value="{{ $pendidikan }}"
                                            {{ old('pendidikan_terakhir') == $pendidikan ? 'selected' : '' }}
                                        >
                                            {{ $pendidikan }}
                                        </option>

                                    @endforeach
                                </select>
                            </div>

                            {{-- PERSETUJUAN --}}
                            <div class="agreement-box mb-4">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="persetujuan"
                                        required
                                    >

                                    <label
                                        class="form-check-label"
                                        for="persetujuan"
                                    >
                                        Saya menyatakan bahwa data yang saya
                                        masukkan adalah benar dan dapat
                                        dipertanggungjawabkan.
                                    </label>
                                </div>
                            </div>

                            {{-- SUBMIT --}}
                            <div class="d-grid">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg submit-button"
                                >
                                    <i class="bi bi-send-fill"></i>
                                    Kirim Pendaftaran
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('dashboard.footer')

@endsection