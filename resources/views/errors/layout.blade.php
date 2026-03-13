@extends('layouts.front')

@section('title', 'Error')

@push('styles')
    @vite(['resources/css/errors.css'])
@endpush

@section('content')
<div class="error-page-wrapper">
    <div class="error-container">
        <div class="error-code">ERR</div>
        <div class="error-content">
            <h1 class="error-title">Terjadi Kesalahan</h1>
            <p class="error-message">
                Sepertinya terjadi kesalahan yang tidak terduga.<br>
                Tim kami sedang berupaya memperbaikinya.
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
