@extends('layouts.front')

@section('title', 'Sedang Pemeliharaan - Maintenance Mode')

@push('styles')
    @vite(['resources/css/errors.css'])
    <style>
        .error-code {
            font-size: 100px;
            letter-spacing: 0;
        }
    </style>
@endpush

@section('content')
<div class="error-page-wrapper">
    <div class="error-container">
        <div class="error-code"><i class="fa-solid fa-screwdriver-wrench"></i></div>
        <div class="error-content">
            <h1 class="error-title">Sedang Perbaikan Sistem</h1>
            <p class="error-message">
                Kami mohon maaf, saat ini website sedang dalam proses pemeliharaan rutin untuk meningkatkan layanan kami.<br>
                Kami akan segera kembali dalam waktu dekat. Terima kasih atas kesabaran Anda.
            </p>
            <div class="error-actions">
                <a href="https://wa.me/6281234567890" target="_blank" class="btn-home" style="background-color: #25D366; box-shadow: 0 4px 14px rgba(37, 211, 102, 0.25);">
                    <i class="fa-brands fa-whatsapp mr-2"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
