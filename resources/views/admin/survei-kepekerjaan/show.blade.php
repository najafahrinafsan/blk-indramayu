@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-person-vcard-fill text-primary me-2"></i>
                Detail Survei Kepekerjaan
            </h3>
            <p class="text-muted mb-0">
                Informasi lengkap data survei kepekerjaan alumni.
            </p>
        </div>

        <a href="{{ route('admin.survei.kepekerjaan.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">
                Data Alumni
            </h5>
        </div>

        <div class="card-body">

            <div class="row g-4">

                <div class="col-md-6">
                    <label class="text-muted small">Nama Lengkap</label>
                    <div class="fw-semibold">
                        {{ $survei->nama_lengkap }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Program Pelatihan</label>
                    <div class="fw-semibold">
                        {{ $survei->program_pelatihan }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Tahun Lulus Pelatihan</label>
                    <div class="fw-semibold">
                        {{ $survei->tahun_lulus }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Status Kerja</label>
                    <div>
                        <span class="badge text-bg-primary">
                            {{ $survei->status_kerja }}
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">
                        Nama Perusahaan / Usaha
                    </label>
                    <div class="fw-semibold">
                        {{ $survei->nama_perusahaan_usaha }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Jabatan</label>
                    <div class="fw-semibold">
                        {{ $survei->jabatan }}
                    </div>
                </div>

                <div class="col-12">
                    <label class="text-muted small">
                        Alamat Perusahaan / Usaha
                    </label>
                    <div class="fw-semibold">
                        {{ $survei->alamat_perusahaan_usaha }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">
                        Bulan & Tahun Mulai Bekerja
                    </label>
                    <div class="fw-semibold">
                        {{ $survei->tanggal_mulai_bekerja
                            ? $survei->tanggal_mulai_bekerja->format('m-Y')
                            : '-' }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">
                        Tanggal Pengisian
                    </label>
                    <div class="fw-semibold">
                        {{ $survei->created_at
                            ? $survei->created_at->format('d-m-Y H:i')
                            : '-' }}
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <a href="{{ route('admin.survei.kepekerjaan.edit', $survei->id) }}"
                   class="btn btn-warning">
                    <i class="bi bi-pencil me-1"></i>
                    Edit Data
                </a>

                <form action="{{ route('admin.survei.kepekerjaan.destroy', $survei->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data survei ini?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i>
                        Hapus Data
                    </button>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection