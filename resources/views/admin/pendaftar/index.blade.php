@extends('layouts.app')

@section('title', 'Data Pendaftar')

@section('content')

@include('dashboard.navbar')

<section class="py-5 bg-light">

    <div class="container">

        <!-- Header -->

<div class="mb-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

        <div>
            <h2 class="fw-bold mb-1">
                Data Pendaftar
            </h2>

            <p class="text-muted mb-0">
                Kelola data peserta yang telah mendaftar.
            </p>
        </div>

        <div class="d-flex flex-column align-items-end gap-2">

            {{-- DOWNLOAD EXCEL --}}
            <a
                href="{{ route('admin.pendaftar.download') }}"
                class="btn btn-success rounded-pill px-4"
            >
                <i class="bi bi-file-earmark-excel-fill me-2"></i>
                Download Excel
            </a>

            {{-- KEMBALI --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-outline-primary rounded-pill px-4"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

        </div>

    </div>

</div>


        <!-- Notifikasi -->

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        <!-- Card -->

        <div class="card border-0 shadow">

            <div class="card-body">


                <!-- Search & Filter -->

                <form
                    action="{{ route('admin.pendaftar.index') }}"
                    method="GET"
                    class="row g-2 mb-4">

                    <div class="col-md-6">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            value="{{ request('search') }}"
                            placeholder="Cari nama, NIK, program, atau nomor HP...">

                    </div>


                    <div class="col-md-3">

                        <select
                            name="status"
                            class="form-select">

                            <option value="">
                                Semua Status
                            </option>

                            <option
                                value="Menunggu"
                                {{ request('status') == 'Menunggu' ? 'selected' : '' }}>

                                Menunggu

                            </option>

                            <option
                                value="Diterima"
                                {{ request('status') == 'Diterima' ? 'selected' : '' }}>

                                Diterima

                            </option>

                            <option
                                value="Ditolak"
                                {{ request('status') == 'Ditolak' ? 'selected' : '' }}>

                                Ditolak

                            </option>

                        </select>

                    </div>


                    <div class="col-md-3">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="bi bi-search me-1"></i>

                            Cari Data

                        </button>

                    </div>

                </form>


                <!-- Tabel -->

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-primary">

                            <tr>

                                <th>No</th>

                                <th>Nama</th>

                                <th>NIK</th>

                                <th>Program Pelatihan</th>

                                <th>No. HP</th>

                                <th>Status</th>

                                <th>Tanggal</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($pendaftarans as $pendaftaran)

                                <tr>

                                    <td>

                                        {{ $pendaftarans->firstItem() + $loop->index }}

                                    </td>


                                    <td>

                                        <strong>
                                            {{ $pendaftaran->nama_lengkap }}
                                        </strong>

                                    </td>


                                    <td>

                                        {{ $pendaftaran->nik }}

                                    </td>


                                    <td>

                                        {{ $pendaftaran->program_pelatihan }}

                                    </td>


                                    <td>

                                        {{ $pendaftaran->no_hp }}

                                    </td>


                                    <td>

                                        @if($pendaftaran->status == 'Menunggu')

                                            <span class="badge bg-warning text-dark">

                                                Menunggu

                                            </span>

                                        @elseif($pendaftaran->status == 'Diterima')

                                            <span class="badge bg-success">

                                                Diterima

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                Ditolak

                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        {{ $pendaftaran->created_at->format('d/m/Y') }}

                                    </td>


                                    <td>

                                        <div class="d-flex gap-1">

                                            <a
                                                href="{{ route('admin.pendaftar.show', $pendaftaran->id) }}"
                                                class="btn btn-sm btn-primary"
                                                title="Detail">

                                                <i class="bi bi-eye"></i>

                                            </a>


                                            <form
                                                action="{{ route('admin.pendaftar.destroy', $pendaftaran->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data pendaftar ini?')">

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="text-center py-5">

                                        <i class="bi bi-inbox display-4 text-muted"></i>

                                        <p class="text-muted mt-3 mb-0">

                                            Belum ada data pendaftar.

                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- Pagination -->

                <div class="mt-4">

                    {{ $pendaftarans->links() }}

                </div>

            </div>

        </div>

    </div>

</section>


@include('dashboard.footer')

@endsection