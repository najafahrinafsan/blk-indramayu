@extends('layouts.app')

@section('title', 'Edit Galeri Kegiatan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                Edit Galeri Kegiatan
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi dan foto dokumentasi kegiatan.
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


    {{-- Error --}}
    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <div class="d-flex align-items-start">

                <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>

                <div>
                    <strong>Data belum lengkap!</strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    @endif


    {{-- Form --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.galeri.update', $galeri->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- Judul --}}
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
                        value="{{ old('judul', $galeri->judul) }}"
                        placeholder="Contoh: Pelatihan Teknik Otomotif"
                        required
                    >

                </div>


                {{-- Deskripsi --}}
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
                    >{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                </div>


                {{-- Foto Saat Ini --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Foto Saat Ini
                    </label>

                    @if($galeri->gambar)

                        <div>
                            <img
                                src="{{ asset('assets/image/galeri/' . $galeri->gambar) }}"
                                alt="{{ $galeri->judul }}"
                                class="img-fluid rounded shadow-sm"
                                style="
                                    max-width: 400px;
                                    max-height: 300px;
                                    object-fit: cover;
                                "
                            >
                        </div>

                    @else

                        <div class="text-muted">
                            Belum ada foto.
                        </div>

                    @endif

                </div>


                {{-- Upload Foto Baru --}}
                <div class="mb-4">

                    <label
                        for="gambar"
                        class="form-label fw-semibold"
                    >
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti foto.
                        Format JPG, JPEG, PNG, WEBP.
                        Maksimal ukuran 2 MB.
                    </div>

                </div>


                {{-- Preview Foto Baru --}}
                <div
                    id="preview-container"
                    class="mb-4 d-none"
                >

                    <label class="form-label fw-semibold">
                        Preview Foto Baru
                    </label>

                    <div>
                        <img
                            id="preview-image"
                            src="#"
                            alt="Preview Foto Baru"
                            class="img-fluid rounded shadow-sm"
                            style="
                                max-width: 400px;
                                max-height: 300px;
                                object-fit: cover;
                            "
                        >
                    </div>

                </div>


                {{-- Button --}}
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
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Preview JavaScript --}}
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