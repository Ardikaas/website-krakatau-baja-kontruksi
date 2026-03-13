@extends('layouts.front')

@section('title', '500 - Server Error')

@push('styles')
    @vite(['resources/css/errors.css'])
@endpush

@section('content')
<div class="error-page-wrapper">
    <div class="error-container">
        <div class="error-code">500</div>
        <div class="error-content">
            <h1 class="error-title">Kesalahan Server Internal</h1>
            <p class="error-message">
                Terjadi kendala teknis pada sistem kami.<br>
                Mohon maaf atas ketidaknyamanannya. Silakan coba beberapa saat lagi.
            </p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn-home">
                    <i class="fa-solid fa-rotate-right mr-2"></i> Coba Lagi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
