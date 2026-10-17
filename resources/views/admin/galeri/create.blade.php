@extends('layouts.app')

@section('title', 'Tambah Galeri Kegiatan')

@section('content')

<div class="container-fluid">

    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Tambah Galeri Kegiatan
            </h2>

            <p class="text-muted mb-0">
                Tambahkan foto dokumentasi kegiatan BLK Kabupaten Indramayu.
            </p>
        </div>

        <a
            href="{{ route('admin.galeri.index') }}"
            class="btn btn-secondary"
        >
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>

    </div>


    {{-- =========================================================
         ERROR VALIDASI
    ========================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger shadow-sm">

            <div class="d-flex align-items-start">

                <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>

                <div>

                    <strong>
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

            </div>

        </div>

    @endif


    {{-- =========================================================
         FORM
    ========================================================== --}}

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.galeri.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- =================================================
                     JUDUL
                ================================================== --}}

                <div class="mb-4">

                    <label
                        for="judul"
                        class="form-label fw-semibold"
                    >
                        Judul Kegiatan
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Pelatihan Teknik Otomotif"
                        required
                    >

                </div>


                {{-- =================================================
                     DESKRIPSI
                ================================================== --}}

                <div class="mb-4">

                    <label
                        for="deskripsi"
                        class="form-label fw-semibold"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        class="form-control"
                        placeholder="Masukkan deskripsi kegiatan..."
                    >{{ old('deskripsi') }}</textarea>

                </div>


                {{-- =================================================
                     GAMBAR
                ================================================== --}}

                <div class="mb-4">

                    <label
                        for="gambar"
                        class="form-label fw-semibold"
                    >
                        Foto Kegiatan
                    </label>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                        required
                    >

                    <div class="form-text">
                        Format yang diperbolehkan:
                        JPG, JPEG, PNG, WEBP.
                        Maksimal ukuran 2 MB.
                    </div>

                </div>


                {{-- =================================================
                     PREVIEW GAMBAR
                ================================================== --}}

                <div
                    id="preview-container"
                    class="mb-4 d-none"
                >

                    <label class="form-label fw-semibold">
                        Preview Foto
                    </label>

                    <div>
                        <img
                            id="preview-image"
                            src="#"
                            alt="Preview"
                            class="img-fluid rounded shadow-sm"
                            style="max-width: 400px; max-height: 300px; object-fit: cover;"
                        >
                    </div>

                </div>


                {{-- =================================================
                     TOMBOL
                ================================================== --}}

                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="{{ route('admin.galeri.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-2"></i>
                        Simpan Galeri
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =============================================================
     PREVIEW FOTO
============================================================= --}}

<script>

document
    .getElementById('gambar')
    .addEventListener('change', function(event) {

        const file = event.target.files[0];

        const previewContainer =
            document.getElementById('preview-container');

        const previewImage =
            document.getElementById('preview-image');


        if (file) {

            const reader = new FileReader();

            reader.onload = function(e) {

                previewImage.src = e.target.result;

                previewContainer.classList.remove('d-none');

            };

            reader.readAsDataURL(file);

        } else {

            previewImage.src = '#';

            previewContainer.classList.add('d-none');

        }

    });

</script>

@endsection