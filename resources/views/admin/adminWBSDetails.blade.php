@extends('layouts.admin')

@section('title', 'Detail Laporan WBS')

@section('content')
<div class="admin-wbs-detail">
    <div class="detail-card">

        <div class="detail-header">
            <span class="report-id">{{ $report->ticket_number }}</span>
            <span class="report-date">
                {{ $report->created_at->format('d M Y') }}
            </span>
        </div>

        <h3 class="section-title">Detail Pelanggaran</h3>

        <div class="detail-item">
            <label>Judul Kasus/Pelanggaran</label>
            <p>{{ $report->judul_kasus }}</p>
        </div>

        <div class="detail-item">
            <label>Tipe Insiden</label>
            <p>{{ $report->tipe_insiden }}</p>
        </div>

        <div class="detail-item">
            <label>Kejadian yang Dilaporkan</label>
            <p>{{ $report->kejadian }}</p>
        </div>

        <div class="detail-grid">
            <div>
                <label>Nama Terlapor</label>
                <p>{{ $report->nama_terlapor ?? '-' }}</p>
            </div>
            <div>
                <label>Jabatan Terlapor</label>
                <p>{{ $report->jabatan_terlapor ?? '-' }}</p>
            </div>
        </div>

        <div class="detail-item">
            <label>Lokasi Kejadian</label>
            <p>{{ $report->lokasi_kejadian ?? '-' }}</p>
        </div>

        <div class="detail-item">
            <label>Waktu Kejadian</label>
            <p>{{ optional($report->tanggal_kejadian)->format('d M Y') }}</p>
        </div>

        <h3 class="section-title">Pihak Pelapor</h3>

        <div class="detail-grid">
            <div>
                <label>Nama</label>
                <p>{{ $report->nama_pelapor ?? 'Anonim' }}</p>
            </div>
            <div>
                <label>Email</label>
                <p>{{ $report->email_pelapor ?? '-' }}</p>
            </div>
            <div>
                <label>Kontak</label>
                <p>{{ $report->kontak_pelapor ?? '-' }}</p>
            </div>
        </div>

        @if ($report->dokumen_pendukung)
        <h3 class="section-title">Lampiran</h3>
        <a href="{{ route('api.wbs.download', $report->id) }}" class="attachment-file">
            Download Dokumen
        </a>
        @endif

    </div>
</div>
@endsection
