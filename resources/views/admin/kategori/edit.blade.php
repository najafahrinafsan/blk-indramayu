@extends('layouts.app')

@section('title', 'Edit Kategori Pelatihan')

@section('content')

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


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow">

                <div class="card-body p-4 p-md-5">


                    <div class="mb-4">

                        <h2 class="fw-bold text-primary">

                            Edit Pelatihan

                        </h2>

                        <p class="text-muted mb-0">

                            Perbarui informasi program pelatihan.

                        </p>

                    </div>


                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        action="{{ route('admin.kategori.update', $kategori->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        <!-- NAMA -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Nama Pelatihan

                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                value="{{ old('nama', $kategori->nama) }}"
                                required
                            >

                        </div>


                        <!-- DESKRIPSI -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Deskripsi

                            </label>

                            <textarea
                                name="deskripsi"
                                class="form-control"
                                rows="5"
                            >{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

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
            {{ old('sumber_anggaran', $kategori->sumber_anggaran) == 'APBD' ? 'selected' : '' }}
        >
            APBD
        </option>

        <option
            value="APBN"
            {{ old('sumber_anggaran', $kategori->sumber_anggaran) == 'APBN' ? 'selected' : '' }}
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


                        <!-- GAMBAR LAMA -->

                        @if($kategori->gambar)

                            <div class="mb-3">

                                <label class="form-label fw-bold">

                                    Gambar Saat Ini

                                </label>

                                <div>

                                    <img
                                        src="{{ asset('assets/image/kategori/' . $kategori->gambar) }}"
                                        alt="{{ $kategori->nama }}"
                                        class="rounded shadow-sm"
                                        width="200"
                                    >

                                </div>

                            </div>

                        @endif


                        <!-- GAMBAR BARU -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Ganti Gambar

                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="text-muted">

                                Kosongkan jika tidak ingin mengganti gambar.
                                Maksimal 2 MB.

                            </small>

                        </div>


                        <!-- STATUS -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Status

                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required
                            >

                                <option
                                    value="Aktif"
                                    {{ old('status', $kategori->status) == 'Aktif' ? 'selected' : '' }}
                                >

                                    Aktif

                                </option>

                                <option
                                    value="Nonaktif"
                                    {{ old('status', $kategori->status) == 'Nonaktif' ? 'selected' : '' }}
                                >

                                    Nonaktif

                                </option>

                            </select>

                        </div>


                        <!-- BUTTON -->

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

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection