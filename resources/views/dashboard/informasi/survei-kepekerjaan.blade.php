@extends('layouts.app')

@section('content')


<style>
    .survey-hero {
        background: linear-gradient(135deg, #0d6efd, #0b5ed7);
        color: #fff;
        padding: 70px 0;
        position: relative;
        overflow: hidden;
    }

    .survey-hero::before,
    .survey-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }

    .survey-hero::before {
        width: 300px;
        height: 300px;
        top: -120px;
        right: -80px;
    }

    .survey-hero::after {
        width: 220px;
        height: 220px;
        bottom: -100px;
        left: -70px;
    }

    .survey-card {
        margin-top: -45px;
        position: relative;
        z-index: 2;
        border: none;
        border-radius: 22px;
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.10);
    }

    .survey-section-title {
        font-weight: 700;
        color: #0d47a1;
    }

    .form-label {
        font-weight: 600;
        color: #344054;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #d0d5dd;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.12);
    }

    .survey-info {
        background: #f0f7ff;
        border-radius: 15px;
        padding: 18px 20px;
        border-left: 4px solid #0d6efd;
    }

    .btn-submit {
        border-radius: 12px;
        padding: 13px 28px;
        font-weight: 600;
    }

    .survey-back-btn {
        display: inline-flex;
        align-items: center;
        padding: 9px 16px;
        border: 1px solid rgba(255, 255, 255, 0.55);
        border-radius: 10px;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.08);
        transition: all 0.2s ease;
    }

    .survey-back-btn:hover {
        background: rgba(255, 255, 255, 0.18);
        border-color: #fff;
        color: #fff;
        transform: translateX(-2px);
    }
</style>



{{-- HERO --}}
<section class="survey-hero">
    <div class="container position-relative">
        <div class="row align-items-center">
          
            <div class="col-lg-8">

    {{-- BUTTON KEMBALI --}}
<div class="mb-4">
    <a href="{{ url('/') }}"
       class="survey-back-btn">
        <i class="bi bi-arrow-left me-2"></i>
        Kembali ke Beranda
    </a>
</div>

    <span class="badge bg-light text-primary rounded-pill px-3 py-2 mb-3">
        <i class="bi bi-clipboard-data me-1"></i>
        Survei Alumni
    </span>

    <h1 class="fw-bold display-5 mb-3">
        Survei Kepekerjaan Alumni
    </h1>

    <p class="lead mb-0">
        Bantu BLK Kabupaten Indramayu mengetahui perkembangan
        alumni setelah mengikuti pelatihan.
    </p>

</div>

            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-bar-chart-line-fill"
                   style="font-size: 120px; opacity: .2;"></i>
            </div>
        </div>
    </div>
</section>

{{-- FORM --}}
<section class="py-5">
    <div class="container">

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        {{-- VALIDATION ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger rounded-4 mb-4">
                <strong>
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Periksa kembali data yang diisi.
                </strong>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card survey-card">
            <div class="card-body p-4 p-lg-5">

                <div class="mb-4">
                    <h3 class="survey-section-title mb-2">
                        <i class="bi bi-person-vcard me-2"></i>
                        Data Alumni
                    </h3>

                    <p class="text-muted mb-0">
                        Silakan isi data dengan benar untuk membantu
                        pendataan alumni BLK Kabupaten Indramayu.
                    </p>
                </div>

                <div class="survey-info mb-4">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>
                    Data yang Anda kirim akan digunakan untuk kebutuhan
                    pendataan dan evaluasi alumni BLK Kabupaten Indramayu.
                </div>

                <form action="{{ route('survei.kepekerjaan.store') }}"
                      method="POST">

                    @csrf

                    <div class="row g-4">

                        {{-- NAMA --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Nama Lengkap
                                <span class="text-danger">*</span>
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

                        {{-- PROGRAM --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Program Pelatihan
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="program_pelatihan"
                                class="form-control"
                                value="{{ old('program_pelatihan') }}"
                                placeholder="Contoh: Teknik Las"
                                required
                            >
                        </div>

                        {{-- TAHUN LULUS --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Tahun Lulus Pelatihan
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                name="tahun_lulus"
                                class="form-control"
                                value="{{ old('tahun_lulus') }}"
                                placeholder="Contoh: 2025"
                                min="1900"
                                max="{{ date('Y') }}"
                                required
                            >
                        </div>

                        {{-- STATUS KERJA --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Status Kerja
                                <span class="text-danger">*</span>
                            </label>

                            <select
                                name="status_kerja"
                                class="form-select"
                                required
                            >
                                <option value="">
                                    -- Pilih Status Kerja --
                                </option>

                                <option value="Owner"
                                    {{ old('status_kerja') == 'Owner' ? 'selected' : '' }}>
                                    Owner
                                </option>

                                <option value="Kontrak"
                                    {{ old('status_kerja') == 'Kontrak' ? 'selected' : '' }}>
                                    Kontrak
                                </option>

                                <option value="Magang"
                                    {{ old('status_kerja') == 'Magang' ? 'selected' : '' }}>
                                    Magang
                                </option>

                                <option value="Tetap"
                                    {{ old('status_kerja') == 'Tetap' ? 'selected' : '' }}>
                                    Tetap
                                </option>

                                <option value="Harian"
                                    {{ old('status_kerja') == 'Harian' ? 'selected' : '' }}>
                                    Harian
                                </option>
                            </select>
                        </div>

                        {{-- PERUSAHAAN --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Nama Perusahaan / Usaha
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="nama_perusahaan_usaha"
                                class="form-control"
                                value="{{ old('nama_perusahaan_usaha') }}"
                                placeholder="Masukkan nama perusahaan/usaha"
                                required
                            >
                        </div>

                        {{-- JABATAN --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Jabatan
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="jabatan"
                                class="form-control"
                                value="{{ old('jabatan') }}"
                                placeholder="Contoh: Teknisi"
                                required
                            >
                        </div>

                        {{-- ALAMAT --}}
                        <div class="col-12">
                            <label class="form-label">
                                Alamat Perusahaan / Usaha
                                <span class="text-danger">*</span>
                            </label>

                            <textarea
                                name="alamat_perusahaan_usaha"
                                class="form-control"
                                rows="4"
                                placeholder="Masukkan alamat lengkap perusahaan/usaha"
                                required
                            >{{ old('alamat_perusahaan_usaha') }}</textarea>
                        </div>

                        {{-- TANGGAL MULAI --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Bulan & Tahun Mulai Bekerja
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="month"
                                name="tanggal_mulai_bekerja"
                                class="form-control"
                                value="{{ old('tanggal_mulai_bekerja') }}"
                                required
                            >

                            <small class="text-muted">
                                Pilih bulan dan tahun mulai bekerja.
                            </small>
                        </div>

                    </div>

                    <hr class="my-5">

                    <div class="d-flex flex-column flex-md-row
                                justify-content-between
                                align-items-md-center gap-3">

                        <div class="text-muted small">
                            <i class="bi bi-shield-check me-1"></i>
                            Pastikan data yang Anda masukkan sudah benar.
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary btn-submit"
                        >
                            <i class="bi bi-send-fill me-2"></i>
                            Kirim Survei
                        </button>

                        

                    </div>

                </form>

            </div>
        </div>

    </div>
</section>

@endsection