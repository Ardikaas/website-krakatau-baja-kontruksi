@extends('layouts.front')

@section('title', '404 - Page Not Found')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
@endpush

@section('content')
<div class="error-page-wrapper">
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-content">
            <h1 class="error-title">Halaman Tidak Ditemukan</h1>
            <p class="error-message">
                Maaf, halaman yang Anda cari tidak ada atau telah dipindahkan.<br>
                Silakan kembali ke beranda untuk melanjutkan penelusuran.
            </p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn-home">
                    <i class="fa-solid fa-house mr-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
