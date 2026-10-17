@extends('layouts.app')

@section('title', 'Detail Pesan - Admin')

@section('content')

<style>
    .message-detail-page {
        min-height: 100vh;
        background: #f8fafc;
    }

    .message-navbar {
        background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    }

    .detail-wrapper {
        padding: 40px 0 60px;
    }

    .detail-header {
        margin-bottom: 25px;
    }

    .detail-header h1 {
        font-size: 30px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 7px;
    }

    .detail-header p {
        color: #64748b;
        margin-bottom: 0;
    }

    .detail-card {
        background: #fff;
        border: 0;
        border-radius: 18px;
        box-shadow: 0 5px 25px rgba(15, 23, 42, .06);
        overflow: hidden;
    }

    .detail-card-header {
        padding: 24px 28px;
        border-bottom: 1px solid #e9eef5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .detail-card-header h4 {
        margin: 0;
        font-weight: 700;
        color: #1e293b;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 13px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
    }

    .status-read {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-unread {
        background: #fff3cd;
        color: #856404;
    }

    .detail-body {
        padding: 30px;
    }

    .sender-section {
        display: flex;
        align-items: center;
        gap: 18px;
        padding-bottom: 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid #eef2f7;
    }

    .sender-avatar {
        width: 65px;
        height: 65px;
        min-width: 65px;
        border-radius: 50%;
        background: #e8f1ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 27px;
    }

    .sender-name {
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 4px;
    }

    .sender-email {
        color: #64748b;
        font-size: 14px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-bottom: 30px;
    }

    .info-item {
        background: #f8fafc;
        border-radius: 12px;
        padding: 16px 18px;
    }

    .info-label {
        display: block;
        color: #94a3b8;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        margin-bottom: 6px;
    }

    .info-value {
        color: #334155;
        font-size: 15px;
        font-weight: 600;
        word-break: break-word;
    }

    .subject-section {
        margin-bottom: 25px;
    }

    .section-label {
        color: #64748b;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .subject-value {
        font-size: 22px;
        font-weight: 700;
        color: #1e293b;
    }

    .message-section {
        margin-top: 25px;
    }

    .message-content {
        background: #f8fafc;
        border-radius: 14px;
        padding: 22px;
        color: #475569;
        line-height: 1.8;
        white-space: pre-line;
        min-height: 150px;
    }

    .detail-footer {
        padding: 20px 28px;
        border-top: 1px solid #e9eef5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .footer-left,
    .footer-right {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .status-form {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-form select {
        min-width: 160px;
    }

    @media (max-width: 768px) {
        .detail-wrapper {
            padding: 25px 15px 40px;
        }

        .detail-header h1 {
            font-size: 25px;
        }

        .detail-body {
            padding: 20px;
        }

        .detail-card-header,
        .detail-footer {
            padding: 18px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .sender-section {
            align-items: flex-start;
        }

        .subject-value {
            font-size: 19px;
        }

        .status-form {
            width: 100%;
        }

        .status-form select {
            flex: 1;
        }
    }
</style>


<div class="message-detail-page">

    {{-- NAVBAR --}}
    <nav class="navbar navbar-dark message-navbar shadow-sm">
        <div class="container">

            <a
                href="{{ route('admin.dashboard') }}"
                class="navbar-brand fw-bold"
            >
                <i class="bi bi-speedometer2 me-2"></i>
                Admin BLK Kabupaten Indramayu
            </a>

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-warning fw-bold px-3"
                >
                    <i class="bi bi-box-arrow-right me-1"></i>
                    Logout
                </button>
            </form>

        </div>
    </nav>


    {{-- CONTENT --}}
    <div class="container detail-wrapper">

        {{-- HEADER --}}
        <div class="detail-header">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h1>
                        <i class="bi bi-envelope-open-fill text-primary me-2"></i>
                        Detail Pesan
                    </h1>

                    <p>
                        Membaca pesan yang dikirim oleh pengunjung website.
                    </p>
                </div>

                <a
                    href="{{ route('admin.pesan.index') }}"
                    class="btn btn-light border px-3"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali ke Pesan
                </a>

            </div>

        </div>


        {{-- SUCCESS --}}
        @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>
            </div>

        @endif


        {{-- DETAIL CARD --}}
        <div class="detail-card">

            {{-- CARD HEADER --}}
            <div class="detail-card-header">

                <h4>
                    <i class="bi bi-chat-left-text me-2 text-primary"></i>
                    Pesan Pengunjung
                </h4>

                @if($pesan->status === 'Belum Dibaca')

                    <span class="status-badge status-unread">
                        <i class="bi bi-envelope-fill"></i>
                        Belum Dibaca
                    </span>

                @else

                    <span class="status-badge status-read">
                        <i class="bi bi-envelope-open-fill"></i>
                        Sudah Dibaca
                    </span>

                @endif

            </div>


            {{-- CARD BODY --}}
            <div class="detail-body">

                {{-- PENGIRIM --}}
                <div class="sender-section">

                    <div class="sender-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div>

                        <div class="sender-name">
                            {{ $pesan->nama }}
                        </div>

                        <div class="sender-email">
                            <i class="bi bi-envelope me-1"></i>
                            {{ $pesan->email }}
                        </div>

                    </div>

                </div>


                {{-- INFORMASI PENGIRIM --}}
                <div class="info-grid">

                    <div class="info-item">

                        <span class="info-label">
                            Nama
                        </span>

                        <div class="info-value">
                            {{ $pesan->nama }}
                        </div>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Email
                        </span>

                        <div class="info-value">
                            {{ $pesan->email }}
                        </div>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Nomor HP
                        </span>

                        <div class="info-value">
                            {{ $pesan->no_hp ?: '-' }}
                        </div>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Dikirim Pada
                        </span>

                        <div class="info-value">
                            {{ $pesan->created_at->format('d F Y, H:i') }}
                        </div>

                    </div>

                </div>


                {{-- SUBJEK --}}
                <div class="subject-section">

                    <div class="section-label">
                        SUBJEK PESAN
                    </div>

                    <div class="subject-value">
                        {{ $pesan->subjek }}
                    </div>

                </div>


                {{-- ISI PESAN --}}
                <div class="message-section">

                    <div class="section-label">
                        ISI PESAN
                    </div>

                    <div class="message-content">
                        {{ $pesan->pesan }}
                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="detail-footer">

                <div class="footer-left">

                    {{-- KEMBALI --}}
                    <a
                        href="{{ route('admin.pesan.index') }}"
                        class="btn btn-light border"
                    >
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>


                <div class="footer-right">

                    {{-- UBAH STATUS --}}
                    <form
                        action="{{ route('admin.pesan.status', $pesan->id) }}"
                        method="POST"
                        class="status-form"
                    >

                        @csrf
                        @method('PUT')

                        <select
                            name="status"
                            class="form-select"
                        >
                            <option
                                value="Belum Dibaca"
                                {{ $pesan->status === 'Belum Dibaca' ? 'selected' : '' }}
                            >
                                Belum Dibaca
                            </option>

                            <option
                                value="Sudah Dibaca"
                                {{ $pesan->status === 'Sudah Dibaca' ? 'selected' : '' }}
                            >
                                Sudah Dibaca
                            </option>
                        </select>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-check2-circle me-1"></i>
                            Simpan
                        </button>

                    </form>


                    {{-- HAPUS --}}
                    <form
                        action="{{ route('admin.pesan.destroy', $pesan->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            <i class="bi bi-trash me-1"></i>
                            Hapus
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection