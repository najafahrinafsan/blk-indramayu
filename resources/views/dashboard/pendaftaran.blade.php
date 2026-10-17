@extends('layouts.app')

@section('title', 'Pendaftaran Pelatihan')

@section('content')

@include('dashboard.navbar')


{{-- =========================================================
     NOTIFIKASI BERHASIL
========================================================= --}}

@if(session('success'))

    <div class="container mt-4">

        <div
            class="alert alert-success alert-dismissible fade show shadow-sm"
            role="alert"
        >

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

                <button
                    type="button"
                    class="btn-close ms-auto"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        </div>

    </div>

@endif


{{-- =========================================================
     NOTIFIKASI ERROR
========================================================= --}}

@if($errors->any())

    <div class="container mt-4">

        <div
            class="alert alert-danger alert-dismissible fade show shadow-sm"
            role="alert"
        >

            <div class="d-flex align-items-start">

                <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>

                <div>

                    <strong class="d-block mb-1">
                        Data belum lengkap!
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

                <button
                    type="button"
                    class="btn-close ms-auto"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        </div>

    </div>

@endif


{{-- =========================================================
     HEADER
========================================================= --}}

<section class="bg-primary text-white py-5">

    <div class="container text-center">

        <h1 class="fw-bold">
            Pendaftaran Pelatihan
        </h1>

        <p class="lead mb-0">
            Daftarkan diri Anda untuk mengikuti program pelatihan
            di Balai Latihan Kerja Kabupaten Indramayu.
        </p>

    </div>

</section>


{{-- =========================================================
     FORM
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-body p-4 p-lg-5">


                        {{-- =================================================
                             JUDUL FORM
                        ================================================== --}}

                        <div class="mb-4">

                            <span class="badge bg-primary mb-2">
                                FORMULIR PESERTA
                            </span>

                            <h3 class="fw-bold text-primary">
                                Formulir Pendaftaran
                            </h3>

                            <p class="text-muted mb-0">
                                Silakan isi data dengan benar dan lengkap.
                            </p>

                        </div>


                        {{-- =================================================
                             PROGRAM YANG DIPILIH
                        ================================================== --}}

                        <div class="alert alert-primary mb-4">

                            <div class="d-flex align-items-start">

                                <i class="bi bi-mortarboard-fill fs-4 me-3"></i>

                                <div>

                                    <small class="d-block text-muted">
                                        Program Pelatihan yang Dipilih
                                    </small>

                                    <strong class="fs-5">
                                        {{ $kategori->nama }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             FORM PENDAFTARAN
                        ================================================== --}}

                        <form
                            action="{{ route('pendaftaran.store', $kategori->id) }}"
                            method="POST"
                        >

                            @csrf


                            {{-- =================================================
                                 NAMA LENGKAP
                            ================================================== --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Nama Lengkap
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


                            {{-- =================================================
                                 NIK
                            ================================================== --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    NIK
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


                            {{-- =================================================
                                 TEMPAT & TANGGAL LAHIR
                            ================================================== --}}

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">
                                        Tempat Lahir
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

                                    <label class="form-label fw-semibold">
                                        Tanggal Lahir
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


                            {{-- =================================================
                                 JENIS KELAMIN
                            ================================================== --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Jenis Kelamin
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


                            {{-- =================================================
                                 ALAMAT
                            ================================================== --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Alamat Lengkap
                                </label>

                                <textarea
                                    name="alamat"
                                    rows="4"
                                    class="form-control"
                                    placeholder="Masukkan alamat lengkap"
                                    required
                                >{{ old('alamat') }}</textarea>

                            </div>


                            {{-- =================================================
                                 HP & EMAIL
                            ================================================== --}}

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label fw-semibold">
                                        Nomor HP / WhatsApp
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

                                    <label class="form-label fw-semibold">
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


                            {{-- =================================================
                                 PENDIDIKAN
                            ================================================== --}}

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Pendidikan Terakhir
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


                            {{-- =================================================
                                 PERSETUJUAN
                            ================================================== --}}

                            <div class="form-check mb-4">

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
                                    dipertanggung jawabkan.
                                </label>

                            </div>


                            {{-- =================================================
                                 SUBMIT
                            ================================================== --}}

                            <div class="d-grid">

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg fw-bold"
                                >

                                    <i class="bi bi-send-fill me-2"></i>

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