@extends('layouts.admin')

@section('title', 'Admin About Us Page Manager')
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
                    <a href="#" class="add-btn open-history-popup">
                        <span class="add-icon">+</span>
                        Add New Point
                    </a>
                </div>
                <div class="history-card-grid">
                    @for ($i = 0; $i < 7; $i++)
                        <div class="history-card open-history-popup"
                            data-title="Foundation Year 1985"
                            data-year="1985" data-description="Our journey began in 1980 with the establishment of a small yet ambitious metal workshop. Focused on precision craftsmanship, we laid the foundation for a company">
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
                    <a href="#" class="add-btn open-people-popup" data-type="direksi">
                        <span class="add-icon">+</span>
                        Add New People
                    </a>
                </div>
                <div class="direction-card-grid">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="direction-card open-people-popup"
                            data-type="direksi"
                            data-name="Someone's Name"
                            data-position="Someone's Posisi">
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
                    <a href="#" class="add-btn open-people-popup" data-type="komisaris">
                        <span class="add-icon">+</span>
                        Add New People
                    </a>
                </div>
                <div class="direction-card-grid">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="direction-card open-people-popup"
                            data-type="komisaris"
                            data-name="Someone's Name"
                            data-position="Someone's Posisi">
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

            <div class="popup-overlay" id="peoplePopup">
                <div class="popup-card">
                    <h3 id="popupTitle" style="margin-bottom:20px;">Add New People</h3>
            
                    <label class="upload-box">
                        <input type="file" hidden>
                        <div class="upload-content">
                            <p>Drop your file here, or <span>Click to browse</span></p>
                        </div>
                    </label>
            
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="peopleName">
                    </div>
            
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" id="peoplePosition">
                    </div>
            
                    <div class="popup-actions">
                        <button class="btn-delete" id="deletePeopleBtn">Delete</button>
            
                        <div class="right-actions">
                            <button class="btn-cancel" id="closePeoplePopup">Cancel</button>
                            <button class="btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="popup-overlay" id="historyPopup">
                <div class="popup-card history-popup-card">
                    <h3 id="historyPopupTitle" style="margin-bottom:20px;">Add History Point</h3>
            
                    <!-- Upload Image -->
                    <label class="upload-box">
                        <input type="file" hidden>
                        <div class="upload-content">
                            <p>Drop your file here, or <span>Click to browse</span></p>
                        </div>
                    </label>
            
                    <!-- Title -->
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" placeholder="e.g Foundation Year 1985" id="historyTitle">
                    </div>
            
                    <!-- Year / Subtitle (optional) -->
                    <div class="form-group">
                        <label>Subtitle / Year</label>
                        <input type="text" placeholder="1985" id="historyYear">
                    </div>
            
                    <!-- Description (LEBAR & FOKUS) -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea
                            rows="6"
                            placeholder="Write history description here..."
                            style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db;" id="historyDescription"
                        ></textarea>
                    </div>
            
                    <!-- Actions -->
                    <div class="popup-actions">
                        <button class="btn-delete" id="deleteHistoryBtn">Delete</button>
            
                        <div class="right-actions">
                            <button class="btn-cancel" id="closeHistoryPopup">Cancel</button>
                            <button class="btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
</div>

    <script>
    const popup = document.getElementById("peoplePopup");
    const closeBtn = document.getElementById("closePeoplePopup");
    const deleteBtn = document.getElementById("deletePeopleBtn");
    
    const nameInput = document.getElementById("peopleName");
    const positionInput = document.getElementById("peoplePosition");
    const popupTitle = document.getElementById("popupTitle");
    
    let editMode = false;
    
    document.querySelectorAll(".open-people-popup").forEach(el => {
        el.addEventListener("click", (e) => {
            e.preventDefault();
    
            const name = el.dataset.name;
            const position = el.dataset.position;
    
            if (name && position) {
                // EDIT MODE
                editMode = true;
                popupTitle.innerText = "Edit People";
                nameInput.value = name;
                positionInput.value = position;
                deleteBtn.style.display = "inline-block";
            } else {
                // ADD MODE
                editMode = false;
                popupTitle.innerText = "Add New People";
                nameInput.value = "";
                positionInput.value = "";
                deleteBtn.style.display = "none";
            }
    
            popup.style.display = "flex";
        });
    });
    
    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });
    
    popup.addEventListener("click", (e) => {
        if (e.target === popup) popup.style.display = "none";
    });

// History Popup
    const historyPopup = document.getElementById('historyPopup');
    const closeHistoryBtn = document.getElementById('closeHistoryPopup');
    const deleteHistoyBtn = document.getElementById("deleteHistoryBtn");

    const historyTitleInput = document.getElementById("historyTitle");
    const historyYearInput = document.getElementById("historyYear");
    const historyDescriptionInput = document.getElementById("historyDescription");
    const historyPopupTitle = document.getElementById("historyPopupTitle");

    let editHistoryMode = false;

    document.querySelectorAll(".open-history-popup").forEach(el => {
        el.addEventListener("click", (e) => {
            e.preventDefault();
    
            const title = el.dataset.title;
            const year = el.dataset.year;
            const description = el.dataset.description;
    
            if (title && year && description) {
                // EDIT MODE
                editHistoryMode = true;
                popupTitle.innerText = "Edit History";
                historyTitleInput.value = title;
                historyYearInput.value = year;
                historyDescriptionInput.value = description;
                deleteHistoryBtn.style.display = "inline-block";
            } else {
                // ADD MODE
                editHistoryMode = false;
                popupTitle.innerText = "Add New Point";
                historyTitleInput.value = "";
                historyYearInput.value = "";
                historyDescriptionInput.value = "";
                deleteHistoryBtn.style.display = "none";
            }
    
            historyPopup.style.display = "flex";
        });
    });

    closeHistoryBtn.addEventListener('click', function () {
        historyPopup.style.display = 'none';
    });

    historyPopup.addEventListener('click', function (e) {
        if (e.target === historyPopup) {
            historyPopup.style.display = 'none';
        }
    });
    </script>
    
    
@endsection