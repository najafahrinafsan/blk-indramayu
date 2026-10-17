@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-pencil-square text-warning me-2"></i>
                Edit Survei Kepekerjaan
            </h3>
            <p class="text-muted mb-0">
                Perbarui data kepekerjaan alumni.
            </p>
        </div>

        <a href="{{ route('admin.survei.kepekerjaan.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
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

            <form action="{{ route('admin.survei.kepekerjaan.update', $survei->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nama Lengkap <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="nama_lengkap"
                               class="form-control"
                               value="{{ old('nama_lengkap', $survei->nama_lengkap) }}"
                               required>
                    </div>

                    {{-- Program --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Program Pelatihan <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="program_pelatihan"
                               class="form-control"
                               value="{{ old('program_pelatihan', $survei->program_pelatihan) }}"
                               required>
                    </div>

                    {{-- Tahun Lulus --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Tahun Lulus Pelatihan <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="tahun_lulus"
                               class="form-control"
                               min="1900"
                               max="{{ date('Y') }}"
                               value="{{ old('tahun_lulus', $survei->tahun_lulus) }}"
                               required>
                    </div>

                    {{-- Nama Perusahaan --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nama Perusahaan / Usaha <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="nama_perusahaan_usaha"
                               class="form-control"
                               value="{{ old('nama_perusahaan_usaha', $survei->nama_perusahaan_usaha) }}"
                               required>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            Alamat Perusahaan / Usaha <span class="text-danger">*</span>
                        </label>

                        <textarea name="alamat_perusahaan_usaha"
                                  class="form-control"
                                  rows="4"
                                  required>{{ old('alamat_perusahaan_usaha', $survei->alamat_perusahaan_usaha) }}</textarea>
                    </div>

                    {{-- Status Kerja --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Status Kerja <span class="text-danger">*</span>
                        </label>

                        <select name="status_kerja"
                                class="form-select"
                                required>

                            <option value="">-- Pilih Status --</option>

                            @foreach (['Owner', 'Kontrak', 'Magang', 'Tetap', 'Harian'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status_kerja', $survei->status_kerja) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Jabatan --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Jabatan <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="jabatan"
                               class="form-control"
                               value="{{ old('jabatan', $survei->jabatan) }}"
                               required>
                    </div>

                    {{-- Mulai Bekerja --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Bulan & Tahun Mulai Bekerja
                            <span class="text-danger">*</span>
                        </label>

                        <input type="month"
                               name="tanggal_mulai_bekerja"
                               class="form-control"
                               value="{{ $survei->tanggal_mulai_bekerja
                                    ? $survei->tanggal_mulai_bekerja->format('Y-m')
                                    : '' }}"
                               required>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.survei.kepekerjaan.index') }}"
                       class="btn btn-outline-secondary">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection