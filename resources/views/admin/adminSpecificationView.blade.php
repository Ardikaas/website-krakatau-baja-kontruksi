@extends('layouts.admin')

@section('title', 'Admin Specifications Editor')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
<div class="admin-news-page">
    <div class="main-container">
        <section class="admin-specifications-editor">
            <div class="specifications-header">
                <h1>Specifications Editor</h1>
            </div>         
            <!-- specifications Cards -->
            <div class="specifications-grid">
                <div class="specifications-grid-header">
                    <h5 class="specifications-grid-title">News</h5>
                    <a href="{{ route('admin.adminNewsAdd') }}" class="specifications-add-btn">
                        <span class="specifications-add-icon">+</span>
                        Add News
                    </a>
                </div>    
                {{-- Card --}}
                <div class="specifications-card-grid">
                    @for ($i = 0; $i < 4; $i++)
                    <div class="specifications-card">
                        <p class="specifications-label">Title</p>
                        <h3 class="specifications-title">Equal Angles</h3>
                    
                        <div class="specifications-images">
                            <!-- Image kiri -->
                            <img 
                                src="{{ asset('images/service/service-2.jpg') }}" 
                                alt="Specification Image">
                    
                            <!-- Image kanan (redup + +1) -->
                            <div class="specifications-image-overlay">
                                <img 
                                    src="{{ asset('images/service/service-2.jpg') }}" 
                                    alt="More Image">
                                <span class="specifications-plus">+1</span>
                            </div>
                        </div>
                    
                        <div class="specifications-info">
                            <p class="info-label">Sizing</p>
                            <p class="info-value">40 × 40 ~ 200 × 200</p>
                    
                            <p class="info-label">Standardization</p>
                            <p class="info-value">SNI 07-0054-2006</p>
                    
                            <p class="info-label">Standardization Equivalent</p>
                            <p class="info-value">ASTM A 36, JIS G 3101</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
</div>
@endsection