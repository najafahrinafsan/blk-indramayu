@extends('layouts.app')

@section('title', 'Detail Pendaftar')

@section('content')

@include('dashboard.navbar')


<section class="py-5 bg-light">

    <div class="container">

        <div class="mb-4">

            <a
                href="{{ route('admin.pendaftar.index') }}"
                class="btn btn-outline-primary">

                <i class="bi bi-arrow-left me-1"></i>

                Kembali

            </a>

        </div>


        <div class="row g-4">


            <!-- Data Peserta -->

            <div class="col-lg-8">

                <div class="card border-0 shadow">

                    <div class="card-body p-4">

                        <h4 class="fw-bold text-primary mb-4">

                            Detail Data Pendaftar

                        </h4>


                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    Nama Lengkap
                                </small>

                                <div class="fw-bold">

                                    {{ $pendaftaran->nama_lengkap }}

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    NIK
                                </small>

                                <div class="fw-bold">

                                    {{ $pendaftaran->nik }}

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    Tempat Lahir
                                </small>

                                <div>

                                    {{ $pendaftaran->tempat_lahir }}

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    Tanggal Lahir
                                </small>

                                <div>

                                    {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d F Y') }}

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    Jenis Kelamin
                                </small>

                                <div>

                                    {{ $pendaftaran->jenis_kelamin }}

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    Pendidikan Terakhir
                                </small>

                                <div>

                                    {{ $pendaftaran->pendidikan_terakhir }}

                                </div>

                            </div>


                            <div class="col-12 mb-3">

                                <small class="text-muted">
                                    Alamat
                                </small>

                                <div>

                                    {{ $pendaftaran->alamat }}

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    Nomor HP
                                </small>

                                <div>

                                    {{ $pendaftaran->no_hp }}

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <small class="text-muted">
                                    Email
                                </small>

                                <div>

                                    {{ $pendaftaran->email ?? '-' }}

                                </div>

                            </div>


                            <div class="col-12">

                                <small class="text-muted">
                                    Program Pelatihan
                                </small>

                                <div class="fw-bold text-primary">

                                    {{ $pendaftaran->program_pelatihan }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Status -->

            <div class="col-lg-4">

                <div class="card border-0 shadow">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">

                            Status Pendaftaran

                        </h5>


                        <form
                            action="{{ route('admin.pendaftar.status', $pendaftaran->id) }}"
                            method="POST">

                            @csrf

                            @method('PUT')


                            <select
                                name="status"
                                class="form-select mb-3">

                                <option
                                    value="Menunggu"
                                    {{ $pendaftaran->status == 'Menunggu' ? 'selected' : '' }}>

                                    Menunggu

                                </option>

                                <option
                                    value="Diterima"
                                    {{ $pendaftaran->status == 'Diterima' ? 'selected' : '' }}>

                                    Diterima

                                </option>

                                <option
                                    value="Ditolak"
                                    {{ $pendaftaran->status == 'Ditolak' ? 'selected' : '' }}>

                                    Ditolak

                                </option>

                            </select>


                            <button
                                type="submit"
                                class="btn btn-primary w-100">

                                <i class="bi bi-check-circle me-1"></i>

                                Simpan Status

                            </button>

                        </form>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


@include('dashboard.footer')

@endsection