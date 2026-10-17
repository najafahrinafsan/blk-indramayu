@extends('layouts.app')

@section('title', 'Tambah Kategori Pelatihan')

@section('content')


<!-- ==========================================
     NAVBAR ADMIN
========================================== -->

<nav class="navbar navbar-dark bg-primary shadow">

    <div class="container">

        <a
            href="{{ route('admin.dashboard') }}"
            class="navbar-brand fw-bold"
        >

            Admin BLK Kabupaten Indramayu

        </a>

    </div>

</nav>


<!-- ==========================================
     FORM TAMBAH
========================================== -->

<div class="container py-5">


    <!-- Header -->

    <div class="mb-4">

        <h2 class="fw-bold text-primary mb-1">

            Tambah Kategori Pelatihan

        </h2>

        <p class="text-muted mb-0">

            Tambahkan program pelatihan baru ke sistem.

        </p>

    </div>


    <!-- ==========================================
         ERROR VALIDASI
    =========================================== -->

    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">

                <i class="bi bi-exclamation-triangle me-1"></i>

                Terdapat kesalahan:

            </div>


            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- ==========================================
         CARD FORM
    =========================================== -->

    <div class="card border-0 shadow">

        <div class="card-body p-4">


            <form
                action="{{ route('admin.kategori.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- ==========================================
                     NAMA
                =========================================== -->

                <div class="mb-4">

                    <label
                        for="nama"
                        class="form-label fw-bold"
                    >

                        Nama Pelatihan

                        <span class="text-danger">
                            *
                        </span>

                    </label>


                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}"
                        placeholder="Contoh: Teknik dan Industri"
                        required
                    >


                    @error('nama')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- ==========================================
                     DESKRIPSI
                =========================================== -->

                <div class="mb-4">

                    <label
                        for="deskripsi"
                        class="form-label fw-bold"
                    >

                        Deskripsi

                    </label>


                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        placeholder="Masukkan deskripsi program pelatihan..."
                    >{{ old('deskripsi') }}</textarea>


                    @error('deskripsi')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>
                
                {{-- ==========================================
     SUMBER ANGGARAN
=========================================== --}}
<div class="mb-4">
    <label
        for="sumber_anggaran"
        class="form-label fw-bold"
    >
        Sumber Anggaran
        <span class="text-danger">*</span>
    </label>

    <select
        id="sumber_anggaran"
        name="sumber_anggaran"
        class="form-select @error('sumber_anggaran') is-invalid @enderror"
        required
    >
        <option value="">
            -- Pilih Sumber Anggaran --
        </option>

        <option
            value="APBD"
            {{ old('sumber_anggaran') == 'APBD' ? 'selected' : '' }}
        >
            APBD
        </option>

        <option
            value="APBN"
            {{ old('sumber_anggaran') == 'APBN' ? 'selected' : '' }}
        >
            APBN
        </option>
    </select>

    <div class="form-text">
        Pilih sumber anggaran yang digunakan untuk program pelatihan.
    </div>

    @error('sumber_anggaran')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


                <!-- ==========================================
                     GAMBAR
                =========================================== -->

                <div class="mb-4">

                    <label
                        for="gambar"
                        class="form-label fw-bold"
                    >

                        Gambar Pelatihan

                    </label>


                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >


                    <div class="form-text">

                        Format: JPG, JPEG, PNG, WEBP.
                        Maksimal 2 MB.

                    </div>


                    @error('gambar')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- ==========================================
                     STATUS
                =========================================== -->

                <div class="mb-4">

                    <label
                        for="status"
                        class="form-label fw-bold"
                    >

                        Status

                        <span class="text-danger">
                            *
                        </span>

                    </label>


                    <select
                        id="status"
                        name="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            -- Pilih Status --
                        </option>


                        <option
                            value="Aktif"
                            {{ old('status') == 'Aktif' ? 'selected' : '' }}
                        >

                            Aktif

                        </option>


                        <option
                            value="Nonaktif"
                            {{ old('status') == 'Nonaktif' ? 'selected' : '' }}
                        >

                            Nonaktif

                        </option>

                    </select>


                    <div class="form-text">

                        <strong>Aktif</strong> = tampil di halaman
                        publik.

                        <br>

                        <strong>Nonaktif</strong> = hanya tampil di
                        halaman admin.

                    </div>


                    @error('status')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- ==========================================
                     TOMBOL
                =========================================== -->

                <div class="d-flex gap-2">


                    <a
                        href="{{ route('admin.kategori.index') }}"
                        class="btn btn-outline-secondary"
                    >

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-save me-1"></i>

                        Simpan Pelatihan

                    </button>


                </div>


            </form>


        </div>

    </div>


</div>

@endsection