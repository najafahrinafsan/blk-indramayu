@extends('layouts.app')

@section('title', 'Pesan Masuk')

@section('content')

<style>
    .message-page {
        min-height: 100vh;
        background: #f5f7fb;
        padding: 35px 0 50px;
    }

    /* HEADER */
    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .message-title {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .message-title-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: linear-gradient(135deg, #0d6efd, #3d8bfd);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        box-shadow: 0 8px 20px rgba(13, 110, 253, .20);
    }

    .message-title h2 {
        margin: 0;
        font-weight: 800;
        color: #172033;
        letter-spacing: -.4px;
    }

    .message-title p {
        margin: 5px 0 0;
        color: #7b8497;
        font-size: 14px;
    }

    /* BACK BUTTON */
    .btn-back {
        background: white;
        border: 1px solid #e5e9f2;
        color: #374151;
        border-radius: 10px;
        padding: 10px 17px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .btn-back:hover {
        background: #f8fafc;
        border-color: #d5dbe7;
        transform: translateY(-1px);
    }

    /* ALERT */
    .custom-alert {
        border: 0;
        border-radius: 13px;
        padding: 15px 18px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
    }

    /* STAT CARDS */
    .message-stat {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 16px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
        transition: all .25s ease;
    }

    .message-stat:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(15, 23, 42, .07);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .stat-blue {
        background: #eaf2ff;
        color: #0d6efd;
    }

    .stat-orange {
        background: #fff3e6;
        color: #f08c00;
    }

    .stat-green {
        background: #eafaf3;
        color: #198754;
    }

    .stat-number {
        font-size: 27px;
        font-weight: 800;
        color: #172033;
        line-height: 1;
        margin-bottom: 5px;
    }

    .stat-label {
        color: #7b8497;
        font-size: 13px;
    }

    /* MAIN CARD */
    .message-card {
        background: white;
        border: 1px solid #e8ecf3;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .05);
    }

    .message-card-header {
        padding: 22px 25px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .message-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .message-card-title h5 {
        margin: 0;
        font-weight: 750;
        color: #172033;
    }

    .message-card-title small {
        display: block;
        color: #8a93a5;
        margin-top: 3px;
    }

    .unread-badge {
        background: #fff4df;
        color: #b96d00;
        border: 1px solid #ffe2ad;
        padding: 8px 13px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    /* TABLE */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .message-table {
        width: 100%;
        min-width: 950px;
        border-collapse: collapse;
        margin: 0;
    }

    .message-table th {
        background: #f8fafc;
        padding: 14px 18px;
        text-align: left;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: #7b8497;
        font-weight: 800;
        white-space: nowrap;
        border-bottom: 1px solid #e9edf3;
    }

    .message-table td {
        padding: 17px 18px;
        border-bottom: 1px solid #f0f2f6;
        vertical-align: middle;
        color: #4b5563;
        font-size: 13px;
    }

    .message-table tbody tr {
        transition: background .2s ease;
    }

    .message-table tbody tr:hover {
        background: #f8fbff;
    }

    .message-table tbody tr:last-child td {
        border-bottom: 0;
    }

    /* NUMBER */
    .message-number {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        background: #f1f5f9;
        color: #64748b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 12px;
    }

    /* SENDER */
    .sender-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 210px;
    }

    .sender-avatar {
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 50%;
        background: linear-gradient(135deg, #0d6efd, #6ea8fe);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 15px;
        text-transform: uppercase;
    }

    .sender-name {
        font-weight: 750;
        color: #172033;
        margin-bottom: 3px;
    }

    .sender-email {
        color: #8a93a5;
        font-size: 12px;
    }

    /* SUBJECT */
    .subject-link {
        color: #0d6efd;
        text-decoration: none;
        font-weight: 700;
        display: inline-block;
        max-width: 220px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .subject-link:hover {
        color: #084298;
        text-decoration: none;
    }

    /* PHONE */
    .phone-text {
        white-space: nowrap;
        color: #64748b;
    }

    /* DATE */
    .date-text {
        white-space: nowrap;
        color: #64748b;
        font-size: 12px;
    }

    /* STATUS */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-unread {
        background: #fff4e5;
        color: #c56a00;
        border: 1px solid #ffe0ad;
    }

    .status-read {
        background: #eaf8f1;
        color: #087443;
        border: 1px solid #c8efdc;
    }

    /* ACTION */
    .action-buttons {
        display: flex;
        gap: 7px;
        align-items: center;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        transition: all .2s ease;
    }

    .action-view {
        background: #eaf2ff;
        color: #0d6efd;
    }

    .action-view:hover {
        background: #0d6efd;
        color: white;
        transform: translateY(-2px);
    }

    .action-delete {
        background: #fff0f0;
        color: #dc3545;
    }

    .action-delete:hover {
        background: #dc3545;
        color: white;
        transform: translateY(-2px);
    }

    /* PAGINATION */
    .pagination-wrapper {
        padding: 20px 25px;
        border-top: 1px solid #edf0f5;
        background: #fff;
    }

    .pagination-wrapper nav {
        margin: 0;
    }

    /* EMPTY */
    .empty-message {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        border-radius: 22px;
        background: #f1f5f9;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
    }

    .empty-message h5 {
        color: #334155;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .empty-message p {
        color: #94a3b8;
        margin: 0;
        font-size: 14px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .message-page {
            padding: 25px 15px 40px;
        }

        .message-header {
            align-items: flex-start;
        }

        .message-title {
            align-items: flex-start;
        }

        .message-title-icon {
            width: 50px;
            height: 50px;
            border-radius: 13px;
        }

        .message-title h2 {
            font-size: 22px;
        }

        .btn-back {
            width: 100%;
            text-align: center;
        }

        .message-card-header {
            padding: 18px;
        }

        .pagination-wrapper {
            padding: 18px;
        }
    }
</style>


<div class="message-page">

    <div class="container-fluid px-lg-4">

        {{-- HEADER --}}
        <div class="message-header">

            <div class="message-title">

                <div class="message-title-icon">
                    <i class="bi bi-envelope-fill"></i>
                </div>

                <div>
                    <h2>Pesan Masuk</h2>

                    <p>
                        Kelola dan baca pesan yang dikirim oleh pengunjung website.
                    </p>
                </div>

            </div>

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-back"
            >
                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Dashboard
            </a>

        </div>


        {{-- NOTIFIKASI --}}
        @if(session('success'))

            <div
                class="alert alert-success custom-alert alert-dismissible fade show mb-4"
                role="alert"
            >
                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>

        @endif


        {{-- STATISTIK --}}
        <div class="row g-3 mb-4">

            {{-- TOTAL --}}
            <div class="col-md-4">

                <div class="message-stat">

                    <div class="stat-icon stat-blue">
                        <i class="bi bi-envelope-paper-fill"></i>
                    </div>

                    <div class="stat-number">
                        {{ $pesans->total() }}
                    </div>

                    <div class="stat-label">
                        Total Pesan
                    </div>

                </div>

            </div>


            {{-- BELUM DIBACA --}}
            <div class="col-md-4">

                <div class="message-stat">

                    <div class="stat-icon stat-orange">
                        <i class="bi bi-envelope-fill"></i>
                    </div>

                    <div class="stat-number">
                        {{ $jumlahBelumDibaca }}
                    </div>

                    <div class="stat-label">
                        Pesan Belum Dibaca
                    </div>

                </div>

            </div>


            {{-- SUDAH DIBACA --}}
            <div class="col-md-4">

                <div class="message-stat">

                    <div class="stat-icon stat-green">
                        <i class="bi bi-envelope-open-fill"></i>
                    </div>

                    <div class="stat-number">
                        {{ $pesans->total() - $jumlahBelumDibaca }}
                    </div>

                    <div class="stat-label">
                        Pesan Sudah Dibaca
                    </div>

                </div>

            </div>

        </div>


        {{-- CARD PESAN --}}
        <div class="message-card">

            {{-- CARD HEADER --}}
            <div class="message-card-header">

                <div class="message-card-title">

                    <i class="bi bi-chat-left-text fs-5 text-primary"></i>

                    <div>

                        <h5>Daftar Pesan</h5>

                        <small>
                            Pesan terbaru dari pengunjung website
                        </small>

                    </div>

                </div>


                <span class="unread-badge">

                    <i class="bi bi-envelope-fill me-1"></i>

                    {{ $jumlahBelumDibaca }} Belum Dibaca

                </span>

            </div>


            @if($pesans->count())

                {{-- TABLE WRAPPER --}}
                <div class="table-wrapper">

                    <table class="message-table">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Pengirim</th>

                                <th>Subjek</th>

                                <th>No. HP</th>

                                <th>Tanggal</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($pesans as $pesan)

                                <tr>

                                    {{-- NO --}}
                                    <td>

                                        <div class="message-number">

                                            {{ $pesans->firstItem() + $loop->index }}

                                        </div>

                                    </td>


                                    {{-- PENGIRIM --}}
                                    <td>

                                        <div class="sender-wrapper">

                                            <div class="sender-avatar">

                                                {{ strtoupper(substr($pesan->nama, 0, 1)) }}

                                            </div>

                                            <div>

                                                <div class="sender-name">

                                                    {{ $pesan->nama }}

                                                </div>

                                                <div class="sender-email">

                                                    {{ $pesan->email }}

                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- SUBJEK --}}
                                    <td>

                                        <a
                                            href="{{ route('admin.pesan.show', $pesan->id) }}"
                                            class="subject-link"
                                            title="{{ $pesan->subjek }}"
                                        >

                                            {{ $pesan->subjek }}

                                        </a>

                                    </td>


                                    {{-- NO HP --}}
                                    <td>

                                        <span class="phone-text">

                                            @if($pesan->no_hp)

                                                <i class="bi bi-telephone me-1"></i>

                                                {{ $pesan->no_hp }}

                                            @else

                                                <span class="text-muted">
                                                    -
                                                </span>

                                            @endif

                                        </span>

                                    </td>


                                    {{-- TANGGAL --}}
                                    <td>

                                        <span class="date-text">

                                            <i class="bi bi-calendar3 me-1"></i>

                                            {{ $pesan->created_at->format('d/m/Y') }}

                                            <br>

                                            <span class="ms-4">

                                                {{ $pesan->created_at->format('H:i') }}

                                            </span>

                                        </span>

                                    </td>


                                    {{-- STATUS --}}
                                    <td>

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

                                    </td>


                                    {{-- AKSI --}}
                                    <td>

                                        <div class="action-buttons">

                                            {{-- LIHAT --}}
                                            <a
                                                href="{{ route('admin.pesan.show', $pesan->id) }}"
                                                class="action-btn action-view"
                                                title="Lihat pesan"
                                            >

                                                <i class="bi bi-eye-fill"></i>

                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('admin.pesan.destroy', $pesan->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pesan dari {{ $pesan->nama }}?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn action-delete"
                                                    title="Hapus pesan"
                                                >

                                                    <i class="bi bi-trash-fill"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}
                @if($pesans->hasPages())

                    <div class="pagination-wrapper">

                        {{ $pesans->links() }}

                    </div>

                @endif


            @else

                {{-- EMPTY STATE --}}
                <div class="empty-message">

                    <div class="empty-icon">

                        <i class="bi bi-envelope-open"></i>

                    </div>

                    <h5>
                        Belum Ada Pesan
                    </h5>

                    <p>
                        Pesan yang dikirim pengunjung akan muncul di halaman ini.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection