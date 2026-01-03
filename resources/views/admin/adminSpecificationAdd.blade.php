@extends('layouts.admin')

@section('title', 'Admin Specifications Editor')

@section('content')
<div class="admin-specifications-page">
    <div class="main-container">
        <section class="admin-add-specifications">

            {{-- HEADER --}}
            <header class="page-header">
                <h1>Specifications Editor</h1>
            </header>
        
            {{-- BASIC INFO --}}
            <section class="spec-section">
                <h2 class="section-title">Basic Info</h2>
        
                <div class="info-grid">
                    <div class="info-group">
                        <label>Title</label>
                        <input type="text" placeholder="Equal Angles">
        
                        <label>Sizing</label>
                        <input type="text" placeholder="40 × 40 ~ 200 × 200">
                    </div>
        
                    <div class="info-group">
                        <label>Standardization</label>
                        <input type="text" placeholder="SNI 07-0054-2006">
        
                        <label>Standardization Equivalent</label>
                        <input type="text" placeholder="ASTM A 36, JIS G 3101">
                    </div>
                </div>
            </section>
        
            {{-- IMAGE --}}
            <section class="spec-section">
                <h2 class="section-title">Image</h2>
        
                <div class="upload-grid">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="upload-box">
                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="">
                            <p>Drop your image here, or <span>Click to browse</span></p>
                        </div>
                    @endfor
                </div>
        
                <p class="helper-text">
                    Upload a hero banner image (1280×720 px).<br>
                    Supported formats: JPG, PNG
                </p>
            </section>
        
            {{-- TABLE --}}
            <section class="spec-section">
                <h2 class="section-title">Table Informations</h2>
        
                <div class="table-wrap">
                    <div class="upload-box small">
                        <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="">
                        <p>Drop your file here, or <span>Click to browse</span></p>
                    </div>
        
                    <div class="file-list">
                        <div class="file-item">
                            <span>Accounting to SNI 07-0054-2006</span>
                            <div class="file-actions">
                                <img src="{{ asset('images/icons/img_pencil_streamline.svg') }}">
                                <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
            {{-- ACTION --}}
            <div class="form-actions">
                <button class="btn-cancel">Cancel</button>
                <button class="btn-primary">Save Changes</button>
            </div>
        
        </section>        
    </div>
</div>
@endsection
