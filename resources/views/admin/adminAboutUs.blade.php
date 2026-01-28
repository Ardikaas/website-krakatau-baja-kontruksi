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

                        @if ($mainImages->count() < 3)
                            <form action="{{ route('admin.aboutus.main-images.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" accept="image/*" hidden id="mainImageInput"
                                    onchange="this.form.submit()">

                                <button type="button" class="add-btn"
                                    onclick="document.getElementById('mainImageInput').click()">
                                    <span class="add-icon">+</span>
                                    Add Image
                                </button>
                            </form>
                        @endif
                    </div>

                    {{-- LIST IMAGE --}}
                    <div class="main-image-list">
                        @foreach ($mainImages as $img)
                            <div class="main-image-item">
                                <div class="main-image-left">
                                    <img src="{{ asset('storage/' . $img->image) }}" class="main-image-preview">
                                </div>

                                <div class="main-image-actions">
                                    <form action="{{ route('admin.aboutus.main-images.delete', $img->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this image?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="default-section-footer">
                        <p class="helper-text">
                            Upload hero banner image (1920×720 px).<br>
                            Max 3 images · JPG / PNG
                        </p>
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
                        @forelse ($histories as $history)
                            <div class="history-card">

                                {{-- DELETE --}}
                                <form action="{{ route('admin.aboutus.history.delete', $history->id) }}" method="POST"
                                    style="position:absolute; top:10px; right:10px;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-delete" onclick="return confirm('Delete history?')">
                                        Delete
                                    </button>
                                </form>

                                <h3>{{ $history->title }}</h3>
                                <small>{{ $history->year }}</small>

                                <div class="history-card-image-wrapper">
                                    <img src="{{ asset('storage/' . $history->image) }}" class="history-card-image">
                                </div>

                                <p>{{ Str::limit($history->description, 120) }}</p>

                            </div>
                        @empty
                            <p>Belum ada history.</p>
                        @endforelse
                    </div>

                </section>

                {{-- <section class="admin-company-section">
                    <div class="default-header">
                        <h5 class="default-sec-title">Company Section</h5>
                    </div>
                    <div class="company-image-upload">
                        <input type="file" id="companyImageInput" accept="image/*" hidden>

                        <div class="company-image-empty" id="companyImageEmpty">
                            <p>No image uploaded</p>
                            <button type="button" class="btn-upload" id="selectCompanyImage">
                                Upload Image
                            </button>
                        </div>

                        <div class="company-image-item" id="companyImageItem" style="display:none;">
                            <img id="companyImagePreview" alt="preview">
                            <span id="companyImageName"></span>

                            <div class="company-image-actions">
                                <button type="button" class="btn-upload" id="changeCompanyImage">
                                    Change
                                </button>
                                <button type="button" class="btn-delete" id="removeCompanyImage">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="default-section-footer">
                        <p class="helper-text">
                            Upload a hero banner image (1920×720 px).<br>
                            Supported formats: JPG, PNG
                        </p>
                    </div>
                </section>

                <section class="admin-company-structure-section">
                    <div class="default-header">
                        <h5 class="default-sec-title">Company Structure</h5>
                    </div>
                    <div class="company-image-upload">
                        <input type="file" id="structureImageInput" accept="image/*" hidden>

                        <div class="company-image-empty" id="structureImageEmpty">
                            <p>No image uploaded</p>
                            <button type="button" class="btn-upload" id="selectStructureImage">
                                Upload Image
                            </button>
                        </div>

                        <div class="company-image-item" id="structureImageItem" style="display:none;">
                            <img id="structureImagePreview" alt="preview">
                            <span id="structureImageName"></span>

                            <div class="company-image-actions">
                                <button type="button" class="btn-upload" id="changeStructureImage">
                                    Change
                                </button>
                                <button type="button" class="btn-delete" id="removeStructureImage">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="default-section-footer">
                        <p class="helper-text">
                            Upload a hero banner image (1920×720 px).<br>
                            Supported formats: JPG, PNG
                        </p>
                    </div>
                </section> --}}

                <section class="admin-direction-teams-section">
                    <div class="default-header">
                        <h5 class="default-sec-title">Team Direksi</h5>
                        <a href="#" class="add-btn open-people-popup" data-type="direksi">
                            <span class="add-icon">+</span>
                            Add New People
                        </a>
                    </div>
                    <div class="direction-card-grid">
                        @forelse ($direksi as $person)
                            <div class="direction-card" data-id="{{ $person->id }}" data-type="direksi"
                                data-name="{{ $person->name }}" data-position="{{ $person->position }}"
                                data-image="{{ $person->image }}">

                                <button class="direction-delete-btn" type="button"
                                    data-id="{{ $person->id }}">Delete</button>

                                <div class="direction-card-image-wrapper">
                                    <img src="{{ asset('storage/' . $person->image) }}" class="direction-card-image"
                                        alt="{{ $person->name }}">
                                </div>

                                <div class="direction-card-content">
                                    <div class="direction-name">
                                        <p class="direction-card-label">Name</p>
                                        <h3 class="direction-team-name">{{ $person->name }}</h3>
                                    </div>

                                    <div class="position">
                                        <p class="direction-card-label">Posisi</p>
                                        <h5 class="direction-card-position">{{ $person->position }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada data Direksi.</p>
                        @endforelse
                    </div>

                    <!-- Add/Edit People Form (Not Popup) -->
                    <div class="people-form-section" id="peopleFormSection"
                        style="display: none; margin-top: 40px; padding: 24px; border: 1px solid #e5e7eb; border-radius: 16px; background: #f9fafb;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                            <h3 id="peopleFormTitle" style="margin: 0; font-size: 18px; font-weight: 600; color: #1f2937;">
                                Add New People</h3>
                            <button type="button" id="closePeopleForm" class="btn-cancel"
                                style="cursor: pointer; background: none; border: none; color: #9ca3af; font-size: 24px;">×</button>
                        </div>

                        <!-- Image Upload -->
                        <div class="people-image-upload" style="margin-bottom: 24px;">
                            <input type="file" id="peopleImageInput" accept="image/*" hidden>

                            <div class="people-image-empty" id="peopleImageEmpty">
                                <div style="flex: 1;">
                                    <span>No image selected</span>
                                </div>
                                <button type="button" class="btn-upload" id="selectPeopleImage">
                                    Upload Image
                                </button>
                            </div>

                            <div class="people-image-item" id="peopleImageItem" style="display:none;">
                                <img id="peopleImagePreview" alt="preview">
                                <span id="peopleImageName"></span>

                                <div class="people-image-actions">
                                    <button type="button" class="btn-upload" id="changePeopleImage">
                                        Change
                                    </button>
                                    <button type="button" class="btn-delete" id="removePeopleImage">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Name Input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="peopleName"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>

                        <!-- Position Input -->
                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>Position</label>
                            <input type="text" id="peoplePosition"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>

                        <!-- Actions -->
                        <div class="popup-actions"
                            style="display: flex; justify-content: space-between; align-items: center;">
                            <button class="btn-delete" id="deletePeopleBtn" style="display: none;">Delete</button>

                            <div class="right-actions" style="display: flex; gap: 12px; margin-left: auto;">
                                <button type="button" class="btn-cancel" id="closePeopleFormBtn"
                                    style="background: none; border: none; color: #9ca3af; cursor: pointer; padding: 10px 22px; border-radius: 14px;">Cancel</button>
                                <button type="button" class="btn-primary" id="savePeopleBtn"
                                    style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer;">Save</button>
                            </div>
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
                        @forelse ($komisaris as $person)
                            <div class="direction-card" data-id="{{ $person->id }}" data-type="komisaris"
                                data-name="{{ $person->name }}" data-position="{{ $person->position }}"
                                data-image="{{ $person->image }}">

                                <button class="direction-delete-btn" type="button"
                                    data-id="{{ $person->id }}">Delete</button>

                                <div class="direction-card-image-wrapper">
                                    <img src="{{ asset('storage/' . $person->image) }}" class="direction-card-image"
                                        alt="{{ $person->name }}">
                                </div>

                                <div class="direction-card-content">
                                    <div class="direction-name">
                                        <p class="direction-card-label">Name</p>
                                        <h3 class="direction-team-name">{{ $person->name }}</h3>
                                    </div>

                                    <div class="position">
                                        <p class="direction-card-label">Posisi</p>
                                        <h5 class="direction-card-position">{{ $person->position }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada data Komisaris.</p>
                        @endforelse
                    </div>

                    <!-- Add/Edit People Form (Not Popup) -->
                    <div class="people-form-section" id="peopleFormSection2"
                        style="display: none; margin-top: 40px; padding: 24px; border: 1px solid #e5e7eb; border-radius: 16px; background: #f9fafb;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                            <h3 id="peopleFormTitle2"
                                style="margin: 0; font-size: 18px; font-weight: 600; color: #1f2937;">Add New People</h3>
                            <button type="button" id="closePeopleForm2" class="btn-cancel"
                                style="cursor: pointer; background: none; border: none; color: #9ca3af; font-size: 24px;">×</button>
                        </div>

                        <!-- Image Upload -->
                        <div class="people-image-upload" style="margin-bottom: 24px;">
                            <input type="file" id="peopleImageInput2" accept="image/*" hidden>

                            <div class="people-image-empty" id="peopleImageEmpty2">
                                <div style="flex: 1;">
                                    <span>No image selected</span>
                                </div>
                                <button type="button" class="btn-upload" id="selectPeopleImage2">
                                    Upload Image
                                </button>
                            </div>

                            <div class="people-image-item" id="peopleImageItem2" style="display:none;">
                                <img id="peopleImagePreview2" alt="preview">
                                <span id="peopleImageName2"></span>

                                <div class="people-image-actions">
                                    <button type="button" class="btn-upload" id="changePeopleImage2">
                                        Change
                                    </button>
                                    <button type="button" class="btn-delete" id="removePeopleImage2">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Name Input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="peopleName2"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>

                        <!-- Position Input -->
                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>Position</label>
                            <input type="text" id="peoplePosition2"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>

                        <!-- Actions -->
                        <div class="popup-actions"
                            style="display: flex; justify-content: space-between; align-items: center;">
                            <button class="btn-delete" id="deletePeopleBtn2" style="display: none;">Delete</button>

                            <div class="right-actions" style="display: flex; gap: 12px; margin-left: auto;">
                                <button type="button" class="btn-cancel" id="closePeopleFormBtn2"
                                    style="background: none; border: none; color: #9ca3af; cursor: pointer; padding: 10px 22px; border-radius: 14px;">Cancel</button>
                                <button type="button" class="btn-primary" id="savePeopleBtn2"
                                    style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer;">Save</button>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="popup-overlay" id="historyPopup">
                    <div class="popup-card history-popup-card">
                        <h3 id="historyPopupTitle" style="margin-bottom:20px;">Add History Point</h3>

                        <!-- Upload Image -->
                        <div class="history-image-upload">
                            <input type="file" id="historyImageInput" accept="image/*" hidden>

                            <div class="history-image-empty" id="historyImageEmpty">
                                <p>No image selected</p>
                                <button type="button" class="btn-upload" id="selectHistoryImage">
                                    Upload Image
                                </button>
                            </div>

                            <div class="history-image-item" id="historyImageItem" style="display:none;">
                                <img id="historyImagePreview" alt="preview">
                                <span id="historyImageName"></span>

                                <div class="history-image-actions">
                                    <button type="button" class="btn-upload" id="changeHistoryImage">
                                        Change
                                    </button>
                                    <button type="button" class="btn-delete" id="removeHistoryImage">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

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
                            <textarea rows="6" placeholder="Write history description here..."
                                style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db;" id="historyDescription"></textarea>
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
        // ... History Popup & Company Section scripts ...
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
                    historyPopupTitle.innerText = "Edit History";
                    historyTitleInput.value = title;
                    historyYearInput.value = year;
                    historyDescriptionInput.value = description;
                    deleteHistoyBtn.style.display = "inline-block";
                } else {
                    // ADD MODE
                    editHistoryMode = false;
                    historyPopupTitle.innerText = "Add New Point";
                    historyTitleInput.value = "";
                    historyYearInput.value = "";
                    historyDescriptionInput.value = "";
                    deleteHistoyBtn.style.display = "none";
                }

                historyPopup.style.display = "flex";
            });
        });

        closeHistoryBtn.addEventListener('click', function() {
            historyPopup.style.display = 'none';
        });

        historyPopup.addEventListener('click', function(e) {
            if (e.target === historyPopup) {
                historyPopup.style.display = 'none';
            }
        });

        const imageInput = document.getElementById('historyImageInput');
        const emptyState = document.getElementById('historyImageEmpty');
        const itemState = document.getElementById('historyImageItem');

        const previewImg = document.getElementById('historyImagePreview');
        const fileNameEl = document.getElementById('historyImageName');

        document.getElementById('selectHistoryImage').onclick =
            document.getElementById('changeHistoryImage').onclick = () => {
                imageInput.click();
            };

        imageInput.addEventListener('change', () => {
            const file = imageInput.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('Only image files are allowed');
                imageInput.value = '';
                return;
            }

            previewImg.src = URL.createObjectURL(file);
            fileNameEl.textContent = file.name;

            emptyState.style.display = 'none';
            itemState.style.display = 'flex';
        });

        document.getElementById('removeHistoryImage').addEventListener('click', () => {
            imageInput.value = '';
            previewImg.src = '';
            fileNameEl.textContent = '';

            itemState.style.display = 'none';
            emptyState.style.display = 'flex';
        });

        const companyInput = document.getElementById('companyImageInput');
        const companyEmpty = document.getElementById('companyImageEmpty');
        const companyItem = document.getElementById('companyImageItem');

        const companyPreview = document.getElementById('companyImagePreview');
        const companyFileName = document.getElementById('companyImageName');

        document.getElementById('selectCompanyImage').onclick =
            document.getElementById('changeCompanyImage').onclick = () => {
                companyInput.click();
            };

        companyInput.addEventListener('change', () => {
            const file = companyInput.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('Only image files are allowed');
                companyInput.value = '';
                return;
            }

            companyPreview.src = URL.createObjectURL(file);
            companyFileName.textContent = file.name;

            companyEmpty.style.display = 'none';
            companyItem.style.display = 'flex';
        });

        document.getElementById('removeCompanyImage').addEventListener('click', () => {
            companyInput.value = '';
            companyPreview.src = '';
            companyFileName.textContent = '';

            companyItem.style.display = 'none';
            companyEmpty.style.display = 'flex';
        });

        const structureInput = document.getElementById('structureImageInput');
        const structureEmpty = document.getElementById('structureImageEmpty');
        const structureItem = document.getElementById('structureImageItem');

        const structurePreview = document.getElementById('structureImagePreview');
        const structureFileName = document.getElementById('structureImageName');

        document.getElementById('selectStructureImage').onclick =
            document.getElementById('changeStructureImage').onclick = () => {
                structureInput.click();
            };

        structureInput.addEventListener('change', () => {
            const file = structureInput.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('Only image files are allowed');
                structureInput.value = '';
                return;
            }

            structurePreview.src = URL.createObjectURL(file);
            structureFileName.textContent = file.name;

            structureEmpty.style.display = 'none';
            structureItem.style.display = 'flex';
        });

        document.getElementById('removeStructureImage').addEventListener('click', () => {
            structureInput.value = '';
            structurePreview.src = '';
            structureFileName.textContent = '';

            structureItem.style.display = 'none';
            structureEmpty.style.display = 'flex';
        });

        // ===== PEOPLE FORM SECTION 1 (DIREKSI) =====
        const peopleFormSection1 = document.getElementById('peopleFormSection');
        const openPeopleBtn1 = document.querySelectorAll('.open-people-popup')[0];
        const closePeopleForm1 = document.getElementById('closePeopleForm');
        const closePeopleFormBtn1 = document.getElementById('closePeopleFormBtn');
        const savePeopleBtn1 = document.getElementById('savePeopleBtn');
        const deletePeopleBtn1 = document.getElementById('deletePeopleBtn');

        const peopleName1 = document.getElementById('peopleName');
        const peoplePosition1 = document.getElementById('peoplePosition');
        const peopleFormTitle1 = document.getElementById('peopleFormTitle');
        const peopleImageInput1 = document.getElementById('peopleImageInput');
        const peopleImageEmpty1 = document.getElementById('peopleImageEmpty');
        const peopleImageItem1 = document.getElementById('peopleImageItem');
        const peopleImagePreview1 = document.getElementById('peopleImagePreview');
        const peopleImageName1 = document.getElementById('peopleImageName');
        const selectPeopleImage1 = document.getElementById('selectPeopleImage');
        const changePeopleImage1 = document.getElementById('changePeopleImage');
        const removePeopleImage1 = document.getElementById('removePeopleImage');

        let editMode1 = false;

        // Open form handler
        if (openPeopleBtn1) {
            openPeopleBtn1.addEventListener('click', (e) => {
                e.preventDefault();
                editMode1 = false;
                peopleFormTitle1.textContent = 'Add New People';
                peopleName1.value = '';
                peoplePosition1.value = '';
                deletePeopleBtn1.style.display = 'none';

                // Reset image
                peopleImageInput1.value = '';
                peopleImagePreview1.src = '';
                peopleImageName1.textContent = '';
                peopleImageEmpty1.style.display = 'flex';
                peopleImageItem1.style.display = 'none';

                peopleFormSection1.style.display = 'block';
            });
        }

        // Close form handlers
        if (closePeopleForm1) {
            closePeopleForm1.addEventListener('click', () => {
                peopleFormSection1.style.display = 'none';
            });
        }

        if (closePeopleFormBtn1) {
            closePeopleFormBtn1.addEventListener('click', () => {
                peopleFormSection1.style.display = 'none';
            });
        }

        // Image upload handlers for Section 1
        if (selectPeopleImage1) {
            selectPeopleImage1.addEventListener('click', (e) => {
                e.preventDefault();
                peopleImageInput1.click();
            });
        }

        if (changePeopleImage1) {
            changePeopleImage1.addEventListener('click', (e) => {
                e.preventDefault();
                peopleImageInput1.click();
            });
        }

        if (peopleImageInput1) {
            peopleImageInput1.addEventListener('change', function() {
                const file = this.files[0];
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed');
                    this.value = '';
                    return;
                }

                peopleImagePreview1.src = URL.createObjectURL(file);
                peopleImageName1.textContent = file.name;

                peopleImageEmpty1.style.display = 'none';
                peopleImageItem1.style.display = 'flex';
            });
        }

        if (removePeopleImage1) {
            removePeopleImage1.addEventListener('click', (e) => {
                e.preventDefault();
                peopleImageInput1.value = '';
                peopleImagePreview1.src = '';
                peopleImageName1.textContent = '';

                peopleImageItem1.style.display = 'none';
                peopleImageEmpty1.style.display = 'flex';
            });
        }

        // Save handler
        if (savePeopleBtn1) {
            savePeopleBtn1.addEventListener('click', () => {
                const name = peopleName1.value.trim();
                const position = peoplePosition1.value.trim();

                if (!name || !position) {
                    alert('Please fill in all fields');
                    return;
                }

                if (!peopleImageInput1.files[0]) {
                    alert('Please upload an image');
                    return;
                }

                // Create FormData
                const formData = new FormData();
                formData.append('type', 'direksi');
                formData.append('name', name);
                formData.append('position', position);
                formData.append('image', peopleImageInput1.files[0]);

                // POST to server
                fetch('{{ route('admin.aboutus.people.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert('Data saved successfully!');
                        location.reload(); // Reload page to show new data
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error saving data');
                    });

                peopleFormSection1.style.display = 'none';
            });
        }

        // ===== PEOPLE FORM SECTION 2 (KOMISARIS) =====
        const peopleFormSection2 = document.getElementById('peopleFormSection2');
        const openPeopleBtn2 = document.querySelectorAll('.open-people-popup')[1];
        const closePeopleForm2 = document.getElementById('closePeopleForm2');
        const closePeopleFormBtn2 = document.getElementById('closePeopleFormBtn2');
        const savePeopleBtn2 = document.getElementById('savePeopleBtn2');
        const deletePeopleBtn2 = document.getElementById('deletePeopleBtn2');

        const peopleName2 = document.getElementById('peopleName2');
        const peoplePosition2 = document.getElementById('peoplePosition2');
        const peopleFormTitle2 = document.getElementById('peopleFormTitle2');
        const peopleImageInput2 = document.getElementById('peopleImageInput2');
        const peopleImageEmpty2 = document.getElementById('peopleImageEmpty2');
        const peopleImageItem2 = document.getElementById('peopleImageItem2');
        const peopleImagePreview2 = document.getElementById('peopleImagePreview2');
        const peopleImageName2 = document.getElementById('peopleImageName2');
        const selectPeopleImage2 = document.getElementById('selectPeopleImage2');
        const changePeopleImage2 = document.getElementById('changePeopleImage2');
        const removePeopleImage2 = document.getElementById('removePeopleImage2');

        let editMode2 = false;

        // Open form handler
        if (openPeopleBtn2) {
            openPeopleBtn2.addEventListener('click', (e) => {
                e.preventDefault();
                editMode2 = false;
                peopleFormTitle2.textContent = 'Add New People';
                peopleName2.value = '';
                peoplePosition2.value = '';
                deletePeopleBtn2.style.display = 'none';

                // Reset image
                peopleImageInput2.value = '';
                peopleImagePreview2.src = '';
                peopleImageName2.textContent = '';
                peopleImageEmpty2.style.display = 'flex';
                peopleImageItem2.style.display = 'none';

                peopleFormSection2.style.display = 'block';
            });
        }

        // Close form handlers
        if (closePeopleForm2) {
            closePeopleForm2.addEventListener('click', () => {
                peopleFormSection2.style.display = 'none';
            });
        }

        if (closePeopleFormBtn2) {
            closePeopleFormBtn2.addEventListener('click', () => {
                peopleFormSection2.style.display = 'none';
            });
        }

        // Image upload handlers for Section 2
        if (selectPeopleImage2) {
            selectPeopleImage2.addEventListener('click', (e) => {
                e.preventDefault();
                peopleImageInput2.click();
            });
        }

        if (changePeopleImage2) {
            changePeopleImage2.addEventListener('click', (e) => {
                e.preventDefault();
                peopleImageInput2.click();
            });
        }

        if (peopleImageInput2) {
            peopleImageInput2.addEventListener('change', function() {
                const file = this.files[0];
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed');
                    this.value = '';
                    return;
                }

                peopleImagePreview2.src = URL.createObjectURL(file);
                peopleImageName2.textContent = file.name;

                peopleImageEmpty2.style.display = 'none';
                peopleImageItem2.style.display = 'flex';
            });
        }

        if (removePeopleImage2) {
            removePeopleImage2.addEventListener('click', (e) => {
                e.preventDefault();
                peopleImageInput2.value = '';
                peopleImagePreview2.src = '';
                peopleImageName2.textContent = '';

                peopleImageItem2.style.display = 'none';
                peopleImageEmpty2.style.display = 'flex';
            });
        }

        // Save handler
        if (savePeopleBtn2) {
            savePeopleBtn2.addEventListener('click', () => {
                const name = peopleName2.value.trim();
                const position = peoplePosition2.value.trim();

                if (!name || !position) {
                    alert('Please fill in all fields');
                    return;
                }

                if (!peopleImageInput2.files[0]) {
                    alert('Please upload an image');
                    return;
                }

                // Create FormData
                const formData = new FormData();
                formData.append('type', 'komisaris');
                formData.append('name', name);
                formData.append('position', position);
                formData.append('image', peopleImageInput2.files[0]);

                // POST to server
                fetch('{{ route('admin.aboutus.people.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert('Data saved successfully!');
                        location.reload(); // Reload page to show new data
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error saving data');
                    });

                peopleFormSection2.style.display = 'none';
            });
        }

        // Delete event handlers for direction cards
        document.querySelectorAll('.direction-delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const personId = this.dataset.id;

                if (confirm('Delete this person?')) {
                    fetch('/admin/aboutus/people/' + personId, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    ?.content || '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert('Data deleted successfully!');
                            location.reload(); // Reload page to remove deleted data
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error deleting data');
                        });
                }
            });
        });
    </script>


@endsection
