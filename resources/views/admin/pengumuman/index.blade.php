@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')

<div class="container-fluid">


    <div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="fw-bold mb-1">Pengumuman</h4>

        <p class="text-muted mb-0">
            Kelola informasi pengumuman yang ditampilkan kepada masyarakat.
        </p>
    </div>

    <div class="d-flex gap-2">

        {{-- Tombol Kembali --}}
        <a href="{{ url('/admin/dashboard') }}"
           class="btn btn-light border">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

        {{-- Tambah Pengumuman --}}
        <a href="{{ route('admin.pengumuman.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Pengumuman
        </a>

    </div>

</div>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th width="60" class="text-center">
                                No
                            </th>

                            <th width="120">
                                Gambar
                            </th>

                            <th>
                                Judul
                            </th>

                            <th width="140">
                                Tanggal
                            </th>

                            <th width="120">
                                Status
                            </th>

                            <th width="170" class="text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($pengumumans as $index => $pengumuman)

                            <tr>

                                {{-- No --}}
                                <td class="text-center">
                                    {{ $pengumumans->firstItem() + $index }}
                                </td>

                                {{-- Gambar --}}
                                <td>

                                    @if ($pengumuman->gambar)

                                        <img
                                            src="{{ asset('assets/image/pengumuman/' . $pengumuman->gambar) }}"
                                            alt="{{ $pengumuman->judul }}"
                                            style="
                                                width: 90px;
                                                height: 65px;
                                                object-fit: cover;
                                                border-radius: 8px;
                                                border: 1px solid #e5e7eb;
                                            "
                                        >

                                    @else

                                        <div
                                            class="d-flex align-items-center justify-content-center bg-light text-muted"
                                            style="
                                                width: 90px;
                                                height: 65px;
                                                border-radius: 8px;
                                            "
                                        >
                                            <i class="bi bi-image fs-4"></i>
                                        </div>

                                    @endif

                                </td>

                                {{-- Judul --}}
                                <td>

                                    <div class="fw-semibold">
                                        {{ $pengumuman->judul }}
                                    </div>

                                    <div class="text-muted small mt-1">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($pengumuman->isi), 90) }}
                                    </div>

                                </td>

                                {{-- Tanggal --}}
                                <td>
                                    @if ($pengumuman->tanggal)
                                        {{ $pengumuman->tanggal->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td>

                                    @if ($pengumuman->status === 'Aktif')

                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Aktif
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle me-1"></i>
                                            Nonaktif
                                        </span>

                                    @endif

                                </td>

                                {{-- Aksi --}}
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-1">

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.pengumuman.edit', $pengumuman->id) }}"
                                           class="btn btn-sm btn-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('admin.pengumuman.destroy', $pengumuman->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5">

                                    <div class="text-muted">

                                        <i class="bi bi-megaphone fs-1 d-block mb-3"></i>

                                        <div class="fw-semibold mb-1">
                                            Belum ada pengumuman
                                        </div>

                                        <div class="small mb-3">
                                            Silakan tambahkan pengumuman baru.
                                        </div>

                                        <a href="{{ route('admin.pengumuman.create') }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="bi bi-plus-lg me-1"></i>
                                            Tambah Pengumuman
                                        </a>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

        {{-- Pagination --}}
        @if ($pengumumans->hasPages())

            <div class="card-footer bg-white border-0 py-3">
                <div class="d-flex justify-content-end">
                    {{ $pengumumans->links() }}
                </div>
            </div>

        @endif

    </div>

</div>

@endsection