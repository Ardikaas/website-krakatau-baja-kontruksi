@extends('layouts.front')

@section('title', '403 - Forbidden')

@push('styles')
    @vite(['resources/css/errors.css'])
@endpush

@section('content')
<div class="error-page-wrapper">
    <div class="error-container">
        <div class="error-code">403</div>
        <div class="error-content">
            <h1 class="error-title">Akses Dibatasi</h1>
            <p class="error-message">
                Anda tidak memiliki izin untuk mengakses halaman ini.<br>
                Silakan hubungi administrator jika Anda merasa ini adalah kesalahan.
            </p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn-home">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
