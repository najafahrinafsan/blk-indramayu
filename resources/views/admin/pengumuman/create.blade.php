@extends('layouts.app')

@section('content')

<style>
    .pengumuman-page {
        padding: 35px 0 60px;
        background: #f6f8fb;
        min-height: calc(100vh - 80px);
    }

    .pengumuman-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .page-title {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #1f2937;
    }

    .page-subtitle {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        border-radius: 10px;
        background: #fff;
        color: #374151;
        text-decoration: none;
        border: 1px solid #e5e7eb;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
    }

    .btn-back:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .form-card {
        background: #fff;
        border-radius: 18px;
        border: 1px solid #e8edf3;
        box-shadow: 0 8px 30px rgba(15, 23, 42, .06);
        overflow: hidden;
    }

    .form-card-header {
        padding: 22px 28px;
        border-bottom: 1px solid #edf0f4;
    }

    .form-card-header h5 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
    }

    .form-card-header p {
        margin: 5px 0 0;
        font-size: 13px;
        color: #6b7280;
    }

    .form-card-body {
        padding: 30px 28px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-label-custom {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    .required {
        color: #dc2626;
    }

    .form-control-custom,
    .form-select-custom {
        width: 100%;
        min-height: 46px;
        padding: 11px 14px;
        border: 1px solid #d9dee7;
        border-radius: 10px;
        background: #fff;
        color: #1f2937;
        font-size: 14px;
        outline: none;
        transition: .2s;
        box-sizing: border-box;
    }

    .form-control-custom:focus,
    .form-select-custom:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
    }

    textarea.form-control-custom {
        min-height: 220px;
        resize: vertical;
        line-height: 1.7;
    }

    .form-help {
        margin-top: 7px;
        font-size: 12px;
        color: #8a94a6;
    }

    .error-message {
        margin-top: 7px;
        color: #dc2626;
        font-size: 12px;
    }

    .input-error {
        border-color: #dc2626 !important;
    }

    .upload-area {
        border: 2px dashed #d8dee8;
        border-radius: 14px;
        padding: 25px;
        background: #fafbfc;
        transition: .2s;
    }

    .upload-area:hover {
        border-color: #9ca3af;
        background: #f8fafc;
    }

    .upload-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #eef4ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 12px;
    }

    .upload-title {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 4px;
    }

    .upload-description {
        font-size: 12px;
        color: #8a94a6;
        margin-bottom: 14px;
    }

    .file-input {
        width: 100%;
        font-size: 13px;
        color: #4b5563;
    }

    .preview-container {
        display: none;
        margin-top: 18px;
    }

    .preview-label {
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .preview-image {
        display: block;
        max-width: 360px;
        width: 100%;
        max-height: 230px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
    }

    .status-box {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .status-option {
        position: relative;
    }

    .status-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .status-label {
        display: block;
        padding: 14px 16px;
        border: 1px solid #d9dee7;
        border-radius: 12px;
        cursor: pointer;
        transition: .2s;
        background: #fff;
    }

    .status-label:hover {
        border-color: #9ca3af;
    }

    .status-name {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    .status-description {
        display: block;
        margin-top: 4px;
        font-size: 12px;
        color: #8a94a6;
    }

    .status-option input:checked + .status-label {
        border-color: #2563eb;
        background: #f5f8ff;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, .08);
    }

    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 8px;
        border-top: 1px solid #edf0f4;
        margin-top: 30px;
    }

    .btn-cancel,
    .btn-submit {
        border: none;
        border-radius: 10px;
        padding: 12px 22px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: .2s;
    }

    .btn-cancel {
        background: #f3f4f6;
        color: #4b5563;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-submit {
        background: #2563eb;
        color: #fff;
    }

    .btn-submit:hover {
        background: #1d4ed8;
        color: #fff;
        transform: translateY(-1px);
    }

    .alert-error {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #9f1239;
        border-radius: 12px;
        padding: 15px 18px;
        margin-bottom: 22px;
    }

    .alert-error-title {
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 7px;
    }

    .alert-error ul {
        margin: 0;
        padding-left: 20px;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .pengumuman-page {
            padding-top: 20px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .page-title {
            font-size: 23px;
        }

        .form-card-body {
            padding: 22px 18px;
        }

        .form-card-header {
            padding: 20px 18px;
        }

        .status-box {
            grid-template-columns: 1fr;
        }

        .form-footer {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-submit {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="pengumuman-page">

    <div class="pengumuman-wrapper">

        {{-- HEADER --}}
        <div class="page-header">

            <div>
                <h1 class="page-title">
                    Tambah Pengumuman
                </h1>

                <p class="page-subtitle">
                    Buat pengumuman baru yang akan ditampilkan pada website BLK Kabupaten Indramayu.
                </p>
            </div>

            <a href="{{ route('admin.pengumuman.index') }}"
               class="btn-back">
                ← Kembali
            </a>

        </div>

        {{-- ERROR --}}
        @if ($errors->any())

            <div class="alert-error">

                <div class="alert-error-title">
                    Periksa kembali data yang diisi
                </div>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        {{-- FORM CARD --}}
        <div class="form-card">

            <div class="form-card-header">
                <h5>Informasi Pengumuman</h5>

                <p>
                    Lengkapi informasi berikut sebelum menyimpan pengumuman.
                </p>
            </div>

            <div class="form-card-body">

                <form action="{{ route('admin.pengumuman.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- JUDUL --}}
                    <div class="form-group">

                        <label for="judul" class="form-label-custom">
                            Judul Pengumuman
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Hasil Akhir Seleksi Pelatihan Berbasis Kompetensi APBD"
                            class="form-control-custom @error('judul') input-error @enderror"
                            required
                        >

                        @error('judul')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- ISI --}}
                    <div class="form-group">

                        <label for="isi" class="form-label-custom">
                            Isi Pengumuman
                            <span class="required">*</span>
                        </label>

                        <textarea
                            id="isi"
                            name="isi"
                            placeholder="Tuliskan isi pengumuman secara lengkap..."
                            class="form-control-custom @error('isi') input-error @enderror"
                            required
                        >{{ old('isi') }}</textarea>

                        <div class="form-help">
                            Tuliskan informasi pengumuman dengan jelas dan lengkap.
                        </div>

                        @error('isi')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- TANGGAL --}}
                    <div class="form-group">

                        <label for="tanggal" class="form-label-custom">
                            Tanggal Pengumuman
                            <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal') }}"
                            class="form-control-custom @error('tanggal') input-error @enderror"
                            required
                        >

                        @error('tanggal')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- GAMBAR --}}
                    <div class="form-group">

                        <label class="form-label-custom">
                            Gambar Pengumuman
                        </label>

                        <div class="upload-area">

                            <div class="upload-icon">
                                🖼
                            </div>

                            <div class="upload-title">
                                Upload gambar atau poster pengumuman
                            </div>

                            <div class="upload-description">
                                JPG, JPEG, PNG atau WEBP — maksimal 2 MB
                            </div>

                            <input
                                type="file"
                                name="gambar"
                                id="gambar"
                                class="file-input @error('gambar') input-error @enderror"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            @error('gambar')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div id="previewContainer" class="preview-container">

                                <div class="preview-label">
                                    Preview gambar
                                </div>

                                <img
                                    id="previewGambar"
                                    class="preview-image"
                                    src=""
                                    alt="Preview gambar"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div class="form-group">

                        <label class="form-label-custom">
                            Status Pengumuman
                            <span class="required">*</span>
                        </label>

                        <div class="status-box">

                            <div class="status-option">

                                <input
                                    type="radio"
                                    name="status"
                                    id="statusAktif"
                                    value="Aktif"
                                    {{ old('status', 'Aktif') === 'Aktif' ? 'checked' : '' }}
                                    required
                                >

                                <label for="statusAktif" class="status-label">

                                    <span class="status-name">
                                        ● Aktif
                                    </span>

                                    <span class="status-description">
                                        Pengumuman ditampilkan di website.
                                    </span>

                                </label>

                            </div>


                            <div class="status-option">

                                <input
                                    type="radio"
                                    name="status"
                                    id="statusNonaktif"
                                    value="Nonaktif"
                                    {{ old('status') === 'Nonaktif' ? 'checked' : '' }}
                                >

                                <label for="statusNonaktif" class="status-label">

                                    <span class="status-name">
                                        ○ Nonaktif
                                    </span>

                                    <span class="status-description">
                                        Pengumuman disimpan tetapi tidak ditampilkan.
                                    </span>

                                </label>

                            </div>

                        </div>

                        @error('status')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- FOOTER --}}
                    <div class="form-footer">

                        <a href="{{ route('admin.pengumuman.index') }}"
                           class="btn-cancel">
                            Batal
                        </a>

                        <button type="submit" class="btn-submit">
                            Simpan Pengumuman
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('gambar');
    const preview = document.getElementById('previewGambar');
    const container = document.getElementById('previewContainer');

    if (!input) {
        return;
    }

    input.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            preview.src = '';
            container.style.display = 'none';
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            preview.src = event.target.result;
            container.style.display = 'block';
        };

        reader.readAsDataURL(file);
    });

});
</script>

@endsection