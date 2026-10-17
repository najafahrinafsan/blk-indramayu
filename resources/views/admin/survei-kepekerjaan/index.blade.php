@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-briefcase-fill text-primary me-2"></i>
                Survei Kepekerjaan Alumni
            </h3>
            <p class="text-muted mb-0">
                Data hasil survei kepekerjaan alumni BLK Kabupaten Indramayu.
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.survei.kepekerjaan.download') }}"
               class="btn btn-success">
                <i class="bi bi-file-earmark-excel me-1"></i>
                Download Excel
            </a>

            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                    <i class="bi bi-people-fill text-primary fs-3"></i>
                </div>

                <div>
                    <div class="text-muted small">
                        Total Data Survei
                    </div>
                    <div class="fs-3 fw-bold">
                        {{ $surveis->total() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Lengkap</th>
                            <th>Program Pelatihan</th>
                            <th>Tahun Lulus</th>
                            <th>Perusahaan / Usaha</th>
                            <th>Status Kerja</th>
                            <th>Jabatan</th>
                            <th>Mulai Bekerja</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($surveis as $index => $survei)
                            <tr>
                                <td class="text-center">
                                    {{ $surveis->firstItem() + $index }}
                                </td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $survei->nama_lengkap }}
                                    </div>
                                </td>

                                <td>
                                    {{ $survei->program_pelatihan }}
                                </td>

                                <td>
                                    {{ $survei->tahun_lulus }}
                                </td>

                                <td>
                                    {{ $survei->nama_perusahaan_usaha }}
                                </td>

                                <td>
                                    @php
                                        $badge = match($survei->status_kerja) {
                                            'Owner' => 'primary',
                                            'Kontrak' => 'warning',
                                            'Magang' => 'info',
                                            'Tetap' => 'success',
                                            'Harian' => 'secondary',
                                            default => 'dark',
                                        };
                                    @endphp

                                    <span class="badge text-bg-{{ $badge }}">
                                        {{ $survei->status_kerja }}
                                    </span>
                                </td>

                                <td>
                                    {{ $survei->jabatan }}
                                </td>

                                <td>
                                    {{ $survei->tanggal_mulai_bekerja
                                        ? $survei->tanggal_mulai_bekerja->format('m-Y')
                                        : '-' }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">

                                        <a href="{{ route('admin.survei.kepekerjaan.show', $survei->id) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.survei.kepekerjaan.edit', $survei->id) }}"
                                           class="btn btn-sm btn-outline-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.survei.kepekerjaan.destroy', $survei->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus data survei ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted"></i>

                                    <div class="mt-2 fw-semibold">
                                        Belum ada data survei kepekerjaan.
                                    </div>

                                    <div class="text-muted small">
                                        Data alumni yang mengisi survei akan tampil di sini.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        @if($surveis->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                {{ $surveis->links() }}
            </div>
        @endif
    </div>

</div>
@endsection