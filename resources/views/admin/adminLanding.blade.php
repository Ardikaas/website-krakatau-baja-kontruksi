@extends('layouts.admin')

@section('title', 'Admin')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
<div class="admin-landing-page">
  <div class="main-container">
    <div class="content-wrapper">
      <div class="main-area">
        <main class="main-content">
          <div class="content-inner">
            <h1 class="page-title">Landing Page Editor</h1>
            
            <!-- Hero Banner Section -->
            <section class="section">
              <h2 class="section-title">Hero Banner</h2>
              
              <div class="upload-grid">
                <div class="upload-zone" tabindex="0" role="button">
                  <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                  <p class="upload-text">Drop your image here, or <span class="link-text">Click to browse</span></p>
                </div>
                
                <div class="upload-zone" tabindex="0" role="button">
                  <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                  <p class="upload-text">Drop your image here, or <span class="link-text">Click to browse</span></p>
                </div>
                
                <div class="upload-zone" tabindex="0" role="button">
                  <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                  <p class="upload-text">Drop your image here, or <span class="link-text">Click to browse</span></p>
                </div>
              </div>
              
              <div class="section-footer">
                <div class="info-section">
                  <div class="info-row">
                    <img src="{{ asset('images/icons/img_information_circle.svg') }}" alt="Info" class="info-icon">
                    <div>
                      <p class="info-text">Upload a hero banner image (1920×730 px).</p>
                      <p class="info-text">Supported formats: JPG, PNG.</p>
                    </div>
                  </div>
                </div>
                
                <div class="action-buttons">
                  <button class="cancel-btn" type="button">Cancel</button>
                  <button class="save-btn" type="button">Save Changes</button>
                </div>
              </div>
            </section>
            
            <!-- Why Choose Us Points Section -->
            <section class="section">
              <div class="section-header">
                <h2 class="section-title">Why Choose Us Points</h2>
                <button class="add-btn" type="button">
                  <img src="{{ asset('images/icons/img_add_1_streamline_core_line_free.svg') }}" alt="Add" class="add-icon">
                  Add New Point
                </button>
              </div>
              
              <div class="points-list">
                <article class="point-item">
                  <div class="point-content">
                    <img src="{{ asset('images/icons/icon-1.png') }}" alt="Industry Expertise Icon" class="point-icon">
                    <div class="point-text">
                      <h3 class="point-title">Industry Expertise</h3>
                      <p class="point-description">Leveraging years of expertise in metal manufacturing to deliver quality, tailored solutions across industries.</p>
                    </div>
                  </div>
                  <div class="point-actions">
                    <img src="{{ asset('images/icons/img_pencil_streamline.svg') }}" alt="Edit" class="action-icon">
                    <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}" alt="Delete" class="action-icon">
                  </div>
                </article>
                
                <article class="point-item">
                  <div class="point-content">
                    <img src="{{ asset('images/icons/icon-2.png') }}" alt="Quality Icon" class="point-icon">
                    <div class="point-text">
                      <h3 class="point-title">Industry Expertise</h3>
                      <p class="point-description">Leveraging years of expertise in metal manufacturing to deliver quality, tailored solutions across industries.</p>
                    </div>
                  </div>
                  <div class="point-actions">
                    <img src="{{ asset('images/icons/img_pencil_streamline.svg') }}" alt="Edit" class="action-icon">
                    <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}" alt="Delete" class="action-icon">
                  </div>
                </article>
                
                <article class="point-item">
                  <div class="point-content">
                    <img src="{{ asset('images/icons/icon-3.png') }}" alt="Support Icon" class="point-icon">
                    <div class="point-text">
                      <h3 class="point-title">Industry Expertise</h3>
                      <p class="point-description">Leveraging years of expertise in metal manufacturing to deliver quality, tailored solutions across industries.</p>
                    </div>
                  </div>
                  <div class="point-actions">
                    <img src="{{ asset('images/icons/img_pencil_streamline.svg') }}" alt="Edit" class="action-icon">
                    <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}" alt="Delete" class="action-icon">
                  </div>
                </article>
              </div>
              
              <div class="section-footer">
                <div class="info-section">
                  <div class="info-row">
                    <div>
                      <p class="info-text">Upload a icon image (500×500 px).</p>
                      <p class="info-text">Supported formats: JPG, PNG.</p>
                    </div>
                  </div>
                </div>
                
                <div class="action-buttons">
                  <button class="cancel-btn" type="button">Cancel</button>
                  <button class="save-btn" type="button">Save Changes</button>
                </div>
              </div>
            </section>
            
            <!-- Downloadable Resources Section -->
            <section class="resources-section">
              <h2 class="section-title">Downloadable Resources</h2>
              
              <div class="resources-content">
                <div class="file-upload" tabindex="0" role="button">
                  <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                  <p class="upload-text">Drop your file here, or <span class="link-text">Click to browse</span></p>
                </div>
                
                <div class="file-list">
                  <div class="file-item">
                    <span class="file-name">Brochure-pdf-file.pdf</span>
                    <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}" alt="Delete" class="delete-icon">
                  </div>
                  
                  <div class="file-item">
                    <span class="file-name">Brochure-pdf-file.pdf</span>
                    <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}" alt="Delete" class="delete-icon">
                  </div>
                </div>
              </div>
              
              <div class="section-footer">
                <div class="info-section">
                  <div class="info-row">
                    <img src="{{ asset('images/icons/img_information_circle.svg') }}" alt="Info" class="info-icon">
                    <div>
                      <p class="info-text">Upload a downloadable resources (1920×730 px).</p>
                      <p class="info-text">Supported formats: PDF.</p>
                    </div>
                  </div>
                </div>
                
                <div class="action-buttons">
                  <button class="cancel-btn" type="button">Cancel</button>
                  <button class="save-btn" type="button">Save Changes</button>
                </div>
              </div>
            </section>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection