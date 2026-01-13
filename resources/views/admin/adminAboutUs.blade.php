@extends('layouts.admin')

@section('title', 'Admin News Manager')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
<div class="admin-news-page">
    <div class="main-container">
        <section class="admin-aboutUs-management">

            <div class="aboutUs-header">
                <h1>About Us Page Editor</h1>
            </div>

            <section class="admin-main-section">
                <div class="default-header">
                    <h2 class="default-sec-title">Main Section</h2>
                </div>
                
        
                <div class="upload-grid">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="upload-box">
                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="">
                            <p>Drop your image here, or <span>Click to browse</span></p>
                        </div>
                    @endfor
                </div>
        
                <div class="default-section-footer">
                    <p class="helper-text">
                        Upload a hero banner image (1920×720 px).<br>
                        Supported formats: JPG, PNG
                    </p>
                    <div class="form-actions">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-primary">Save Changes</button>
                    </div>
                </div>
            </section>

            <section class="admin-history-section">
                <div class="default-header">
                    <h5 class="default-sec-title">History</h5>
                    <a href="#" class="add-btn">
                        <span class="add-icon">+</span>
                        Add New Point
                    </a>
                </div>
                <div class="history-card-grid">
                    @for ($i = 0; $i < 7; $i++)
                        <div class="history-card">
                            <p class="history-card-label">Title</p>

                            <h3 class="history-card-title">
                                Foundation Year 1985
                            </h3>

                            <div class="history-card-image-wrapper"><img
                                src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b"
                                class="history-card-image"
                                alt="thumbnail"
                            ></div>

                            <div class="history-card-content">
                                <p class="history-card-label">Description</p>

                                <h5 class="history-card-description">
                                    Our journey began in 1980 with the establishment of a small yet ambitious metal workshop. Focused on precision craftsmanship, we laid the foundation for a company
                                </h5>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="default-section-footer">
                    <div class="empty-div"></div>
                    <div class="form-actions">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-primary">Save Changes</button>
                    </div>
                </div>
            </section>

            <section class="admin-company-section">
                <div class="default-header">
                    <h5 class="default-sec-title">Company Section</h5>
                </div>
                <div class="upload-wrapper">
                    <div class="default-editor-upload">
                        <div class="default-editor-upload-inner">
                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                            <p class="upload-text">Drop your image here, or <span class="link-text">Click to browse</span></p>
                        </div>
                    </div>
                </div>
                <div class="default-section-footer">
                    <p class="helper-text">
                        Upload a hero banner image (1920×720 px).<br>
                        Supported formats: JPG, PNG
                    </p>
                    <div class="form-actions">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-primary">Save Changes</button>
                    </div>
                </div>
            </section>

            <section class="admin-company-structure-section">
                <div class="default-header">
                    <h5 class="default-sec-title">Company Structure</h5>
                </div>
                <div class="upload-wrapper">
                    <div class="default-editor-upload">
                        <div class="default-editor-upload-inner">
                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                            <p class="upload-text">Drop your image here, or <span class="link-text">Click to browse</span></p>
                        </div>
                    </div>
                </div>
                <div class="default-section-footer">
                    <p class="helper-text">
                        Upload a hero banner image (1920×720 px).<br>
                        Supported formats: JPG, PNG
                    </p>
                    <div class="form-actions">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-primary">Save Changes</button>
                    </div>
                </div>
            </section>

            <section class="admin-direction-teams-section">
                <div class="default-header">
                    <h5 class="default-sec-title">Team Direksi</h5>
                    <a href="#" class="add-btn" id="openAddPeoplePopup">
                        <span class="add-icon">+</span>
                        Add New People
                    </a>
                </div>
                <div class="direction-card-grid">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="direction-card">
                            <div class="direction-card-image-wrapper"><img
                                src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b"
                                class="direction-card-image"
                                alt="thumbnail"
                            ></div>

                            <div class="direction-card-content">
                                <div class="direction-name">
                                    <p class="direction-card-label">Name</p>

                                    <h3 class="direction-team-name">
                                        Someone's Name
                                    </h3>
                                </div>
                                <div class="position">
                                    <p class="direction-card-label">Posisi</p>
                                    <h5 class="direction-card-position">
                                        Someone's Posisi
                                    </h5>
                                </div>

                            </div>
                        </div>
                    @endfor
                </div>
                <div class="default-section-footer">
                    <div class="empty-div"></div>
                    <div class="form-actions">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-primary">Save Changes</button>
                    </div>
                </div>
            </section>

            <section class="admin-direction-teams-section">
                <div class="default-header">
                    <h5 class="default-sec-title">Dewan Komisaris</h5>
                    <a href="#" class="add-btn">
                        <span class="add-icon">+</span>
                        Add New People
                    </a>
                </div>
                <div class="direction-card-grid">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="direction-card">
                            <div class="direction-card-image-wrapper"><img
                                src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b"
                                class="direction-card-image"
                                alt="thumbnail"
                            ></div>

                            <div class="direction-card-content">
                                <div class="direction-name">
                                    <p class="direction-card-label">Name</p>

                                    <h3 class="direction-team-name">
                                        Someone's Name
                                    </h3>
                                </div>
                                <div class="position">
                                    <p class="direction-card-label">Posisi</p>
                                    <h5 class="direction-card-position">
                                        Someone's Posisi
                                    </h5>
                                </div>

                            </div>
                        </div>
                    @endfor
                </div>
                <div class="default-section-footer">
                    <div class="empty-div"></div>
                    <div class="form-actions">
                        <button class="btn-cancel">Cancel</button>
                        <button class="btn-primary">Save Changes</button>
                    </div>
                </div>
            </section>

            <div class="popup-overlay" id="addPeoplePopup">
                <div class="popup-card">
                    <!-- Upload -->
                    <label class="upload-box">
                        <input type="file" hidden>
                        <div class="upload-content">
                            <i class="upload-icon">⬆</i>
                            <p>
                                Drop your file here, or
                                <span>Click to browse</span>
                            </p>
                        </div>
                    </label>
            
                    <!-- Form -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" placeholder="e.g Tony Setia Boedi Hoesodo">
                    </div>
            
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" placeholder="e.g Komisaris Utama merangkap Komisaris Independen">
                    </div>
            
                    <!-- Actions -->
                    <div class="popup-actions">
                        <button class="btn-delete">Delete</button>
            
                        <div class="right-actions">
                            <button class="btn-cancel" id="closeAddPeoplePopup">Cancel</button>
                            <button class="btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
</div>

<script>
    const openBtn = document.getElementById("openAddPeoplePopup");
    const popup = document.getElementById("addPeoplePopup");
    const closeBtn = document.getElementById("closeAddPeoplePopup");
    
    openBtn.addEventListener("click", (e) => {
        e.preventDefault();
        popup.style.display = "flex";
    });
    
    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });
    
    // klik area gelap untuk tutup
    popup.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });
    </script>
    
@endsection