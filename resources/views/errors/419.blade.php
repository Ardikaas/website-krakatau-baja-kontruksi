@extends('layouts.front')

@section('title', '419 - Page Expired')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
@endpush

@section('content')
<div class="error-page-wrapper">
    <div class="error-container">
        <div class="error-code">419</div>
        <div class="error-content">
            <h1 class="error-title">Sesi Berakhir</h1>
            <p class="error-message">
                Halaman telah kedaluwarsa karena Anda terlalu lama tidak beraktivitas.<br>
                Silakan segarkan halaman dan coba lagi.
            </p>
            <div class="error-actions">
                <a href="{{ url()->current() }}" class="btn-home">
                    <i class="fa-solid fa-arrows-rotate mr-2"></i> Segarkan Halaman
                </a>
                <a href="{{ url('/') }}" class="btn-home" style="background-color: transparent; color: var(--color-00a1d1); border: 1px solid var(--color-00a1d1); box-shadow: none;">
                    Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
