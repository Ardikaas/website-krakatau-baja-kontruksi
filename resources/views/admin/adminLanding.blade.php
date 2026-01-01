@extends('layouts.admin')

@section('title', 'Landing Page Editor')
@section('meta_description', 'Comprehensive landing page editor for managing hero banners, feature points, and downloadable resources.')

@section('content')
<div class="admin-landing-page">
  <div class="main-container">
    <button class="hamburger" onclick="toggleSidebar()">☰</button>
    <div class="sidebar-overlay" onclick="closeSidebar()"></div>
    
    <div class="content-wrapper">
      {{-- sidebar --}}
      <aside class="sidebar" id="sidebar">
        <img src="{{ asset('images/logo.png') }}" alt="Krakatau Logo" class="sidebar-logo">
        
        <nav class="sidebar-menu" role="navigation">
          <a href="{{ route('admin.landingEdit') }}" class="menu-item active" role="menuitem" tabindex="0">
            <img src="{{ asset('images/icons/img_home_3_streamline.svg') }}" alt="" class="menu-icon">
            <span class="menu-text">Landing Content</span>
          </a>
          
          <a href="#" class="menu-item" role="menuitem" tabindex="0">
            <img src="{{ asset('images/icons/img_bullet_list_streamline.svg') }}" alt="" class="menu-icon">
            <span class="menu-text">Specifications</span>
          </a>
          
          <a href="#" class="menu-item" role="menuitem" tabindex="0">
            <img src="{{ asset('images/icons/img_shipment_remove.svg') }}" alt="" class="menu-icon">
            <span class="menu-text">Product Management</span>
          </a>
          
          <a href="#" class="menu-item" role="menuitem" tabindex="0">
            <img src="{{ asset('images/icons/img_news_paper_streamline.svg') }}" alt="" class="menu-icon">
            <span class="menu-text">News Management</span>
          </a>
          
          <div class="sidebar-bottom">
            <a href="#" class="menu-item" role="menuitem" tabindex="0">
              <img src="{{ asset('images/icons/img_logout_1_streamline.svg') }}" alt="" class="menu-icon">
              <span class="menu-text" style="color: #00a1d1;">Sign Out</span>
            </a>
          </div>
        </nav>
      </aside>
      {{-- end sidebar --}}
      
      <div class="main-area">
        {{-- header --}}
        <header class="header">
          <div class="search-container">
            <img src="{{ asset('images/icons/img_magnifying_glass.svg') }}" alt="Search" class="search-icon">
            <span class="search-text">Search for menu</span>
          </div>
          
          <div class="user-section">
            <div class="divider-line"></div>
            <div class="user-info">
              <img src="{{ asset('images/icons/icon-1.png') }}" alt="User Avatar" class="user-avatar">
              <span class="user-name">Admin User</span>
            </div>
          </div>
        </header>
        {{-- end header --}}
        
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

@push('scripts')
<script>
  // Mobile sidebar toggle functionality
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.querySelector('.sidebar-overlay');
    
    sidebar.classList.toggle('mobile-open');
    overlay.style.display = sidebar.classList.contains('mobile-open') ? 'block' : 'none';
  }
  
  function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.querySelector('.sidebar-overlay');
    
    sidebar.classList.remove('mobile-open');
    overlay.style.display = 'none';
  }
  
  // Menu item selection
  document.querySelectorAll('.admin-landing-page .menu-item').forEach(item => {
    item.addEventListener('click', function() {
      // Remove active class from all items
      document.querySelectorAll('.admin-landing-page .menu-item').forEach(i => i.classList.remove('active'));
      // Add active class to clicked item
      this.classList.add('active');
      
      // Close mobile sidebar after selection
      if (window.innerWidth < 1024) {
        closeSidebar();
      }
    });
    
    // Keyboard navigation
    item.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        this.click();
      }
    });
  });
  
  // Upload zone interactions
  document.querySelectorAll('.admin-landing-page .upload-zone, .admin-landing-page .file-upload').forEach(zone => {
    zone.addEventListener('click', function() {
      // Simulate file upload dialog
      console.log('File upload dialog would open here');
    });
    
    zone.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        this.click();
      }
    });
    
    // Drag and drop visual feedback
    zone.addEventListener('dragover', function(e) {
      e.preventDefault();
      this.style.borderColor = '#00a1d1';
      this.style.backgroundColor = '#f0f9ff';
    });
    
    zone.addEventListener('dragleave', function(e) {
      e.preventDefault();
      this.style.borderColor = '#00000033';
      this.style.backgroundColor = '#ffffff';
    });
    
    zone.addEventListener('drop', function(e) {
      e.preventDefault();
      this.style.borderColor = '#00000033';
      this.style.backgroundColor = '#ffffff';
      console.log('Files dropped:', e.dataTransfer.files);
    });
  });
  
  // Action button interactions
  document.querySelectorAll('.admin-landing-page .action-icon, .admin-landing-page .delete-icon').forEach(icon => {
    icon.addEventListener('click', function(e) {
      e.stopPropagation();
      const action = this.alt.toLowerCase();
      console.log(`${action} action triggered`);
      
      if (action === 'delete') {
        if (confirm('Are you sure you want to delete this item?')) {
          this.closest('.point-item, .file-item').remove();
        }
      }
    });
  });
  
  // Add new point functionality
  const addBtn = document.querySelector('.admin-landing-page .add-btn');
  if (addBtn) {
    addBtn.addEventListener('click', function() {
      console.log('Add new point dialog would open here');
    });
  }
  
  // Save and cancel button functionality
  document.querySelectorAll('.admin-landing-page .save-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      console.log('Save changes');
      alert('Changes saved successfully!');
    });
  });
  
  document.querySelectorAll('.admin-landing-page .cancel-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
        console.log('Changes cancelled');
      }
    });
  });
  
  // Close mobile sidebar when window is resized to desktop
  window.addEventListener('resize', function() {
    if (window.innerWidth >= 1024) {
      closeSidebar();
    }
  });
</script>
@endpush