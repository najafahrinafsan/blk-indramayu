@extends('layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Edit Pengumuman</h4>
            <p class="text-muted mb-0">
                Perbarui informasi pengumuman.
            </p>
        </div>

        <a href="{{ route('admin.pengumuman.index') }}"
           class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="fw-bold mb-2">
                Terdapat kesalahan:
            </div>

            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-4">
                    <label for="judul" class="form-label fw-semibold">
                        Judul Pengumuman
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $pengumuman->judul) }}"
                        placeholder="Masukkan judul pengumuman"
                        required
                    >

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Isi --}}
                <div class="mb-4">
                    <label for="isi" class="form-label fw-semibold">
                        Isi Pengumuman
                        <span class="text-danger">*</span>
                    </label>

                    <textarea
                        name="isi"
                        id="isi"
                        rows="8"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Masukkan isi pengumuman"
                        required
                    >{{ old('isi', $pengumuman->isi) }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="mb-4">
                    <label for="tanggal" class="form-label fw-semibold">
                        Tanggal Pengumuman
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        id="tanggal"
                        class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal', optional($pengumuman->tanggal)->format('Y-m-d')) }}"
                        required
                    >

                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Gambar Lama --}}
                @if ($pengumuman->gambar)
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Gambar Saat Ini
                        </label>

                        <div>
                            <img
                                src="{{ asset('assets/image/pengumuman/' . $pengumuman->gambar) }}"
                                alt="{{ $pengumuman->judul }}"
                                style="
                                    width: 300px;
                                    max-height: 200px;
                                    object-fit: contain;
                                    border-radius: 10px;
                                    border: 1px solid #ddd;
                                    padding: 5px;
                                "
                            >
                        </div>
                    </div>
                @endif

                {{-- Gambar Baru --}}
                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">
                        Ganti Gambar
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Preview gambar baru --}}
                    <div class="mt-3">
                        <img
                            id="previewGambar"
                            src="#"
                            alt="Preview Gambar Baru"
                            style="
                                display: none;
                                max-width: 300px;
                                max-height: 200px;
                                object-fit: contain;
                                border-radius: 10px;
                                border: 1px solid #ddd;
                                padding: 5px;
                            "
                        >
                    </div>
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label for="status" class="form-label fw-semibold">
                        Status
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        name="status"
                        id="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required
                    >
                        <option value="">-- Pilih Status --</option>

                        <option value="Aktif"
                            {{ old('status', $pengumuman->status) == 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="Nonaktif"
                            {{ old('status', $pengumuman->status) == 'Nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>

                    <div class="form-text">
                        Status Aktif membuat pengumuman tampil di halaman publik.
                    </div>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex gap-2 pt-2">

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.pengumuman.index') }}"
                       class="btn btn-light border px-4">
                        Batal
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    document.getElementById('gambar').addEventListener('change', function(event) {

        const file = event.target.files[0];
        const preview = document.getElementById('previewGambar');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
@endpush