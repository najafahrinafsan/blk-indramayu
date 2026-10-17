@extends('layouts.app')

@section('title', 'Kategori Pelatihan')

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

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary mb-1">
                Kategori Pelatihan
            </h2>

            <p class="text-muted mb-0">
                Kelola program dan kategori pelatihan BLK Kabupaten Indramayu.
            </p>
        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-outline-primary"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

            <a
                href="{{ route('admin.kategori.create') }}"
                class="btn btn-success"
            >
                <i class="bi bi-plus-circle me-1"></i>
                Tambah Pelatihan
            </a>

        </div>
    </div>


    {{-- NOTIFIKASI --}}
    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Tutup"
            ></button>
        </div>

    @endif


    {{-- VALIDASI ERROR --}}
    @if($errors->any())

        <div
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
        >
            <strong>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Tutup"
            ></button>
        </div>

    @endif


    {{-- TABEL --}}
    <div class="card border-0 shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary">
                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th width="120">
                                Gambar
                            </th>

                            <th>
                                Nama Pelatihan
                            </th>

                            <th>
                                Sumber Anggaran
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th>
                                Status
                            </th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>
                    </thead>


                    <tbody>

                        @forelse($kategoris as $kategori)

                            <tr>

                                {{-- NO --}}
                                <td>
                                    {{ $kategoris->firstItem() + $loop->index }}
                                </td>


                                {{-- GAMBAR --}}
                                <td>

                                    @if($kategori->gambar)

                                        <img
                                            src="{{ asset('assets/image/kategori/' . $kategori->gambar) }}"
                                            alt="{{ $kategori->nama }}"
                                            width="80"
                                            height="60"
                                            class="rounded"
                                            style="object-fit: cover;"
                                        >

                                    @else

                                        <div
                                            class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width:80px;height:60px;"
                                        >
                                            <i class="bi bi-image text-muted"></i>
                                        </div>

                                    @endif

                                </td>


                                {{-- NAMA PELATIHAN --}}
                                <td>
                                    <strong>
                                        {{ $kategori->nama }}
                                    </strong>
                                </td>


                                {{-- SUMBER ANGGARAN --}}
                                <td>

                                    @if($kategori->sumber_anggaran === 'APBN')

                                        <span class="badge bg-success">
                                            <i class="bi bi-building me-1"></i>
                                            APBN
                                        </span>

                                    @else

                                        <span class="badge bg-primary">
                                            <i class="bi bi-bank me-1"></i>
                                            APBD
                                        </span>

                                    @endif

                                </td>


                                {{-- DESKRIPSI --}}
                                <td>
                                    {{ Str::limit($kategori->deskripsi, 80) }}
                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @if($kategori->status === 'Aktif')

                                        <span class="badge bg-success">
                                            Aktif
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Nonaktif
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="d-flex gap-1">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.kategori.edit', $kategori->id) }}"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>


                                        {{-- DELETE --}}
                                        <form
                                            action="{{ route('admin.kategori.destroy', $kategori->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pelatihan ini?');"
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

                                <td
                                    colspan="7"
                                    class="text-center py-5"
                                >

                                    <i class="bi bi-book display-4 text-muted"></i>

                                    <p class="text-muted mt-3 mb-0">
                                        Belum ada kategori pelatihan.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            <div class="mt-3">

                {{ $kategoris->links() }}

            </div>

        </div>

    </div>

</div>

@endsection