@extends('layouts.admin')

@section('title', 'Admin About Us Page Manager')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <style>
        /* Fallback button styles for cached browsers */
        .admin-aboutUs-management .direction-actions {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 8px;
            z-index: 10;
            opacity: 0;
            transition: opacity 0.2s ease;
        }
        .admin-aboutUs-management .direction-card:hover .direction-actions {
            opacity: 1;
        }
        .admin-aboutUs-management .direction-delete-btn {
            position: static !important;
            background: rgba(239, 68, 68, 0.9) !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 6px 12px !important;
            font-size: 12px !important;
            cursor: pointer !important;
        }
        .admin-aboutUs-management .direction-edit-btn {
            position: static !important;
            background: #eab308 !important; /* Standout Yellow */
            color: #ffffff !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 6px 12px !important;
            font-size: 12px !important;
            cursor: pointer !important;
        }
    </style>
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
                                    <img src="{{ route('admin.aboutus.view', ['filename' => $img->image]) }}" class="main-image-preview">
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
                            <div class="history-card" data-id="{{ $history->id }}" data-title-en="{{ $history->title_en }}" data-description-en="{{ $history->description_en }}">

                                {{-- DELETE (hover reveal) --}}
                                <button class="history-delete-btn" type="button"
                                    data-id="{{ $history->id }}">Delete</button>

                                <div class="history-card-image-wrapper">
                                    @if ($history->image)
                                        <img src="{{ route('admin.aboutus.history.view', ['filename' => basename($history->image)]) }}" class="history-card-image"
                                            alt="{{ $history->title }}">
                                    @else
                                        <div class="history-card-image-placeholder">
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="history-card-content">
                                    <div class="history-title-group">
                                        <p class="history-card-label">Title</p>
                                        <h3 class="history-card-title">{{ $history->title }}</h3>
                                    </div>

                                    <div class="history-year-group">
                                        <p class="history-card-label">Year</p>
                                        <h5 class="history-card-year">{{ $history->year ?? '-' }}</h5>
                                    </div>

                                    <div class="history-desc-group">
                                        <p class="history-card-label">Description</p>
                                        <p class="history-card-description">{{ Str::limit($history->description, 120) }}</p>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <p>Belum ada history.</p>
                        @endforelse
                    </div>
                </section>

                <section class="admin-company-section">
                    <div class="default-header">
                        <h5 class="default-sec-title">Company Section</h5>
                    </div>
                    <div class="company-image-upload">
                        <input type="file" id="companyImageInput" accept="image/*" hidden>

                        <div class="company-image-empty" id="companyImageEmpty" @if($companyImage && $companyImage->value) style="display:none;" @endif>
                            <p>No image uploaded</p>
                            <button type="button" class="btn-upload" id="selectCompanyImage">
                                Upload Image
                            </button>
                        </div>

                        <div class="company-image-item" id="companyImageItem" @if($companyImage && $companyImage->value) style="display:flex;" @else style="display:none;" @endif>
                            <img id="companyImagePreview" alt="preview" @if($companyImage && $companyImage->value) src="{{ route('admin.aboutus.view', ['filename' => $companyImage->value]) }}" @endif>
                            <span id="companyImageName">@if($companyImage && $companyImage->value) Current image @endif</span>

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
                        <button type="button" class="btn-primary" id="saveCompanyImage"
                            style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer; margin-top: 12px;">Save</button>
                    </div>
                </section>

                <section class="admin-company-structure-section">
                    <div class="default-header">
                        <h5 class="default-sec-title">Company Structure</h5>
                    </div>
                    <div class="company-image-upload">
                        <input type="file" id="structureImageInput" accept="image/*" hidden>

                        <div class="company-image-empty" id="structureImageEmpty" @if($structureImage && $structureImage->value) style="display:none;" @endif>
                            <p>No image uploaded</p>
                            <button type="button" class="btn-upload" id="selectStructureImage">
                                Upload Image
                            </button>
                        </div>

                        <div class="company-image-item" id="structureImageItem" @if($structureImage && $structureImage->value) style="display:flex;" @else style="display:none;" @endif>
                            <img id="structureImagePreview" alt="preview" @if($structureImage && $structureImage->value) src="{{ route('admin.aboutus.view', ['filename' => $structureImage->value]) }}" @endif>
                            <span id="structureImageName">@if($structureImage && $structureImage->value) Current image @endif</span>

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
                        <button type="button" class="btn-primary" id="saveStructureImage"
                            style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer; margin-top: 12px;">Save</button>
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
                        @forelse ($direksi as $person)
                            <div class="direction-card" data-id="{{ $person->id }}" data-type="direksi"
                                data-name="{{ $person->name }}" data-position="{{ $person->position }}"
                                data-image="{{ $person->image }}">

                                <div class="direction-actions">
                                    <button class="direction-edit-btn" type="button" 
                                        data-person="{{ json_encode($person) }}" data-type="direksi">Edit</button>
                                    <button class="direction-delete-btn" type="button" 
                                        data-id="{{ $person->id }}">Delete</button>
                                </div>

                                <div class="direction-card-image-wrapper">
                                    <img src="{{ route('admin.aboutus.people.view', ['filename' => basename($person->image)]) }}" class="direction-card-image"
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
                            <h3 id="peopleFormTitle"
                                style="margin: 0; font-size: 18px; font-weight: 600; color: #1f2937;">Add New People</h3>
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
                            <label>Position (ID)</label>
                            <input type="text" id="peoplePosition"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>
                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>Position (EN)</label>
                            <input type="text" id="peoplePositionEn"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>

                        <!-- CV Fields -->
                        <div class="form-group" style="margin-bottom: 24px; display: flex; gap: 16px;">
                            <div style="flex: 1;">
                                <label>Start Date</label>
                                <input type="date" id="peopleStartDate" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                            </div>
                            <div style="flex: 1;">
                                <label>End Date</label>
                                <input type="date" id="peopleEndDate" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                                <small style="color: #6b7280; display: block; margin-top: 4px;">Kosongkan jika masih menjabat ("Sekarang")</small>
                            </div>
                        </div>

                        <!-- CV Mode Choice -->
                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>CV Display Mode</label>
                            <select id="peopleCvMode" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px; background: #fff;">
                                <option value="both">Both (Summary & Points)</option>
                                <option value="summary_only">Summary Only (Hide Points)</option>
                                <option value="points_only">Points Only (Hide Summary)</option>
                            </select>
                            <small style="color: #6b7280; display: block; margin-top: 4px;">Pilih bagian CV mana yang ingin ditampilkan pada halaman depan</small>
                        </div>

                        <!-- Summary Fields -->
                        <div class="form-group" style="margin-bottom: 24px; display: flex; gap: 16px;">
                            <div style="flex: 1;">
                                <label>Summary (ID)</label>
                                <textarea id="peopleSummary" rows="4" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;"></textarea>
                            </div>
                            <div style="flex: 1;">
                                <label>Summary (EN)</label>
                                <textarea id="peopleSummaryEn" rows="4" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;"></textarea>
                            </div>
                        </div>

                        <!-- Top Career History -->
                        <div class="form-group" style="margin-bottom: 24px; border: 1px solid #e5e7eb; padding: 16px; border-radius: 10px; background: #fff;">
                            <label style="font-weight: 600; display: block; margin-bottom: 12px;">Top Career History (Max 10)</label>
                            <div id="peopleCareerList" style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 16px;"></div>
                            <button type="button" class="btn-primary" id="addPeopleCareerBtn" style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer; font-size: 14px; width: max-content;">+ Add Career</button>
                        </div>

                        <!-- Top Organization History -->
                        <div class="form-group" style="margin-bottom: 24px; border: 1px solid #e5e7eb; padding: 16px; border-radius: 10px; background: #fff;">
                            <label style="font-weight: 600; display: block; margin-bottom: 12px;">Top Organization History (Max 10)</label>
                            <div id="peopleOrgList" style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 16px;"></div>
                            <button type="button" class="btn-primary" id="addPeopleOrgBtn" style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer; font-size: 14px; width: max-content;">+ Add Organization</button>
                        </div>

                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>Full Body Image</label>
                            <input type="file" id="peopleFullBodyImageInput" accept="image/*" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
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

                                <div class="direction-actions">
                                    <button class="direction-edit-btn" type="button" 
                                        data-person="{{ json_encode($person) }}" data-type="komisaris">Edit</button>
                                    <button class="direction-delete-btn" type="button" 
                                        data-id="{{ $person->id }}">Delete</button>
                                </div>

                                <div class="direction-card-image-wrapper">
                                    <img src="{{ route('admin.aboutus.people.view', ['filename' => basename($person->image)]) }}" class="direction-card-image"
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
                            <label>Position (ID)</label>
                            <input type="text" id="peoplePosition2"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>
                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>Position (EN)</label>
                            <input type="text" id="peoplePositionEn2"
                                style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                        </div>

                        <!-- CV Fields -->
                        <div class="form-group" style="margin-bottom: 24px; display: flex; gap: 16px;">
                            <div style="flex: 1;">
                                <label>Start Date</label>
                                <input type="date" id="peopleStartDate2" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                            </div>
                            <div style="flex: 1;">
                                <label>End Date</label>
                                <input type="date" id="peopleEndDate2" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
                                <small style="color: #6b7280; display: block; margin-top: 4px;">Kosongkan jika masih menjabat ("Sekarang")</small>
                            </div>
                        </div>

                        <!-- CV Mode Choice -->
                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>CV Display Mode</label>
                            <select id="peopleCvMode2" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px; background: #fff;">
                                <option value="both">Both (Summary & Points)</option>
                                <option value="summary_only">Summary Only (Hide Points)</option>
                                <option value="points_only">Points Only (Hide Summary)</option>
                            </select>
                            <small style="color: #6b7280; display: block; margin-top: 4px;">Pilih bagian CV mana yang ingin ditampilkan pada halaman depan</small>
                        </div>

                        <!-- Summary Fields -->
                        <div class="form-group" style="margin-bottom: 24px; display: flex; gap: 16px;">
                            <div style="flex: 1;">
                                <label>Summary (ID)</label>
                                <textarea id="peopleSummary2" rows="4" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;"></textarea>
                            </div>
                            <div style="flex: 1;">
                                <label>Summary (EN)</label>
                                <textarea id="peopleSummaryEn2" rows="4" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;"></textarea>
                            </div>
                        </div>

                        <!-- Top Career History -->
                        <div class="form-group" style="margin-bottom: 24px; border: 1px solid #e5e7eb; padding: 16px; border-radius: 10px; background: #fff;">
                            <label style="font-weight: 600; display: block; margin-bottom: 12px;">Top Career History (Max 10)</label>
                            <div id="peopleCareerList2" style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 16px;"></div>
                            <button type="button" class="btn-primary" id="addPeopleCareerBtn2" style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer; font-size: 14px; width: max-content;">+ Add Career</button>
                        </div>

                        <!-- Top Organization History -->
                        <div class="form-group" style="margin-bottom: 24px; border: 1px solid #e5e7eb; padding: 16px; border-radius: 10px; background: #fff;">
                            <label style="font-weight: 600; display: block; margin-bottom: 12px;">Top Organization History (Max 10)</label>
                            <div id="peopleOrgList2" style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 16px;"></div>
                            <button type="button" class="btn-primary" id="addPeopleOrgBtn2" style="background: #00a1d1; color: #fff; border: none; border-radius: 14px; padding: 10px 22px; cursor: pointer; font-size: 14px; width: max-content;">+ Add Organization</button>
                        </div>

                        <div class="form-group" style="margin-bottom: 24px;">
                            <label>Full Body Image</label>
                            <input type="file" id="peopleFullBodyImageInput2" accept="image/*" style="width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 10px;">
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
                            <label>Title (ID)</label>
                            <input type="text" placeholder="e.g Foundation Year 1985" id="historyTitle">
                        </div>
                        <div class="form-group">
                            <label>Title (EN)</label>
                            <input type="text" placeholder="e.g Foundation Year 1985" id="historyTitleEn">
                        </div>

                        <!-- Year / Subtitle (optional) -->
                        <div class="form-group">
                            <label>Subtitle / Year</label>
                            <input type="text" placeholder="1985" id="historyYear">
                        </div>

                        <!-- Description (LEBAR & FOKUS) -->
                        <div class="form-group">
                            <label>Description (ID)</label>
                            <textarea rows="6" placeholder="Write history description here..."
                                style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db;" id="historyDescription"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description (EN)</label>
                            <textarea rows="6" placeholder="Write history description here..."
                                style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db;" id="historyDescriptionEn"></textarea>
                        </div>

                        <!-- Actions -->
                        <div class="popup-actions">
                            <button class="btn-delete" id="deleteHistoryBtn">Delete</button>

                            <div class="right-actions">
                                <button class="btn-cancel" id="closeHistoryPopup">Cancel</button>
                                <button class="btn-primary" id="confirmHistoryBtn">Confirm</button>
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
        const historyTitleEnInput = document.getElementById("historyTitleEn");
        const historyYearInput = document.getElementById("historyYear");
        const historyDescriptionInput = document.getElementById("historyDescription");
        const historyDescriptionEnInput = document.getElementById("historyDescriptionEn");
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
                    historyTitleEnInput.value = el.dataset.titleEn || "";
                    historyYearInput.value = year;
                    historyDescriptionInput.value = description;
                    historyDescriptionEnInput.value = el.dataset.descriptionEn || "";
                    deleteHistoyBtn.style.display = "inline-block";
                } else {
                    // ADD MODE
                    editHistoryMode = false;
                    historyPopupTitle.innerText = "Add New Point";
                    historyTitleInput.value = "";
                    historyTitleEnInput.value = "";
                    historyYearInput.value = "";
                    historyDescriptionInput.value = "";
                    historyDescriptionEnInput.value = "";
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
            if (confirm('Delete this company image?')) {
                // Delete from server
                fetch('/admin/aboutus/section-image/company_image', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Server error');
                    companyInput.value = '';
                    companyPreview.src = '';
                    companyFileName.textContent = '';
                    companyItem.style.display = 'none';
                    companyEmpty.style.display = 'flex';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting company image');
                });
            }
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
            if (confirm('Delete this structure image?')) {
                // Delete from server
                fetch('/admin/aboutus/section-image/structure_image', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Server error');
                    structureInput.value = '';
                    structurePreview.src = '';
                    structureFileName.textContent = '';
                    structureItem.style.display = 'none';
                    structureEmpty.style.display = 'flex';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting structure image');
                });
            }
        });

        // ===== SAVE COMPANY SECTION IMAGE =====
        document.getElementById('saveCompanyImage').addEventListener('click', () => {
            if (!companyInput.files[0]) {
                alert('Please upload an image first');
                return;
            }

            const formData = new FormData();
            formData.append('key', 'company_image');
            formData.append('image', companyInput.files[0]);

            fetch('{{ route('admin.aboutus.section-image.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error('Server error');
                return response.json();
            })
            .then(data => {
                alert('Company image saved successfully!');
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving company image');
            });
        });

        // ===== SAVE STRUCTURE IMAGE =====
        document.getElementById('saveStructureImage').addEventListener('click', () => {
            if (!structureInput.files[0]) {
                alert('Please upload an image first');
                return;
            }

            const formData = new FormData();
            formData.append('key', 'structure_image');
            formData.append('image', structureInput.files[0]);

            fetch('{{ route('admin.aboutus.section-image.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error('Server error');
                return response.json();
            })
            .then(data => {
                alert('Structure image saved successfully!');
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving structure image');
            });
        });

        // Utility functions for dynamic CV lists
        function setupDynamicList(addBtnId, listContainerId) {
            const addBtn = document.getElementById(addBtnId);
            const container = document.getElementById(listContainerId);
            
            if(addBtn && container) {
                addBtn.addEventListener('click', () => {
                    if(container.children.length >= 10) {
                        alert('Maximum 10 allowed');
                        return;
                    }
                    const row = document.createElement('div');
                    row.style.cssText = 'display:flex; flex-wrap:wrap; gap:10px; margin-bottom:10px; border-bottom:1px solid #f3f4f6; padding-bottom:10px;';
                    row.innerHTML = `
                        <input type="number" class="item-start-year" placeholder="Start Year (YYYY)" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                        <input type="number" class="item-end-year" placeholder="End (YYYY/Blank=Present)" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                        <input type="text" class="item-desc-id" placeholder="Description (ID)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                        <input type="text" class="item-desc-en" placeholder="Description (EN)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                        <button type="button" onclick="this.parentElement.remove()" style="background:#ef4444; color:#fff; border:none; border-radius:6px; padding:0 12px; cursor:pointer;">X</button>
                    `;
                    container.appendChild(row);
                });
            }
        }
        
        setupDynamicList('addPeopleCareerBtn', 'peopleCareerList');
        setupDynamicList('addPeopleOrgBtn', 'peopleOrgList');
        setupDynamicList('addPeopleCareerBtn2', 'peopleCareerList2');
        setupDynamicList('addPeopleOrgBtn2', 'peopleOrgList2');
        
        function extractDynamicList(containerId) {
            const container = document.getElementById(containerId);
            if(!container) return null;
            const items = [];
            container.querySelectorAll('div').forEach(row => {
                const startYear = row.querySelector('.item-start-year')?.value.trim();
                const endYear = row.querySelector('.item-end-year')?.value.trim();
                const descId = row.querySelector('.item-desc-id')?.value.trim();
                const descEn = row.querySelector('.item-desc-en')?.value.trim();
                
                const start_date = startYear ? startYear + '-01-01' : '';
                const end_date = endYear ? endYear + '-01-01' : '';

                if(start_date || descId) {
                    items.push({ start_date, end_date, descId, descEn });
                }
            });
            return items.length > 0 ? JSON.stringify(items) : null;
        }

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
        let editPersonId1 = null;

        // Edit button handler (shared for both direksi and komisaris)
        document.querySelectorAll('.direction-edit-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const personData = JSON.parse(this.dataset.person);
                const type = this.dataset.type;

                if (type === 'direksi') {
                    editMode1 = true;
                    editPersonId1 = personData.id;
                    peopleFormTitle1.textContent = 'Edit People';
                    peopleName1.value = personData.name || '';
                    peoplePosition1.value = personData.position || '';
                    document.getElementById('peoplePositionEn').value = personData.position_en || '';
                    document.getElementById('peopleSummary').value = personData.summary || '';
                    document.getElementById('peopleSummaryEn').value = personData.summary_en || '';
                    document.getElementById('peopleCvMode').value = personData.cv_mode || 'both';
                    document.getElementById('peopleStartDate').value = personData.start_date ? personData.start_date.split('T')[0] : '';
                    document.getElementById('peopleEndDate').value = personData.end_date ? personData.end_date.split('T')[0] : '';
                    
                    // Populate careers
                    const careerList = document.getElementById('peopleCareerList');
                    careerList.innerHTML = '';
                    if(personData.career_history) {
                        personData.career_history.forEach(item => {
                            careerList.insertAdjacentHTML('beforeend', `
                                <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:10px; border-bottom:1px solid #f3f4f6; padding-bottom:10px;">
                                    <input type="number" class="item-start-year" value="${item.start_date ? item.start_date.split('-')[0] : ''}" placeholder="Start Year" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="number" class="item-end-year" value="${item.end_date ? item.end_date.split('-')[0] : ''}" placeholder="End (Blank=Present)" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-id" value="${item.descId || ''}" placeholder="Description (ID)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-en" value="${item.descEn || ''}" placeholder="Description (EN)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <button type="button" onclick="this.parentElement.remove()" style="background:#ef4444; color:#fff; border:none; border-radius:6px; padding:0 12px; cursor:pointer;">X</button>
                                </div>
                            `);
                        });
                    }

                    // Populate orgs
                    const orgList = document.getElementById('peopleOrgList');
                    orgList.innerHTML = '';
                    if(personData.organization_history) {
                        personData.organization_history.forEach(item => {
                            orgList.insertAdjacentHTML('beforeend', `
                                <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:10px; border-bottom:1px solid #f3f4f6; padding-bottom:10px;">
                                    <input type="number" class="item-start-year" value="${item.start_date ? item.start_date.split('-')[0] : ''}" placeholder="Start Year" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="number" class="item-end-year" value="${item.end_date ? item.end_date.split('-')[0] : ''}" placeholder="End (Blank=Present)" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-id" value="${item.descId || ''}" placeholder="Description (ID)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-en" value="${item.descEn || ''}" placeholder="Description (EN)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <button type="button" onclick="this.parentElement.remove()" style="background:#ef4444; color:#fff; border:none; border-radius:6px; padding:0 12px; cursor:pointer;">X</button>
                                </div>
                            `);
                        });
                    }

                    // Set image
                    if(personData.image) {
                        let filename = personData.image.split('/').pop();
                        peopleImagePreview1.src = "{{ route('admin.aboutus.people.view', ['filename' => 'DUMMY']) }}".replace('DUMMY', filename);
                        peopleImageName1.textContent = 'Current Image';
                        peopleImageEmpty1.style.display = 'none';
                        peopleImageItem1.style.display = 'flex';
                    }

                    peopleFormSection1.style.display = 'block';
                } else {
                    editMode2 = true;
                    editPersonId2 = personData.id;
                    peopleFormTitle2.textContent = 'Edit People';
                    peopleName2.value = personData.name || '';
                    peoplePosition2.value = personData.position || '';
                    document.getElementById('peoplePositionEn2').value = personData.position_en || '';
                    document.getElementById('peopleSummary2').value = personData.summary || '';
                    document.getElementById('peopleSummaryEn2').value = personData.summary_en || '';
                    document.getElementById('peopleCvMode2').value = personData.cv_mode || 'both';
                    document.getElementById('peopleStartDate2').value = personData.start_date ? personData.start_date.split('T')[0] : '';
                    document.getElementById('peopleEndDate2').value = personData.end_date ? personData.end_date.split('T')[0] : '';
                    
                    // Populate careers
                    const careerList = document.getElementById('peopleCareerList2');
                    careerList.innerHTML = '';
                    if(personData.career_history) {
                        personData.career_history.forEach(item => {
                            careerList.insertAdjacentHTML('beforeend', `
                                <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:10px; border-bottom:1px solid #f3f4f6; padding-bottom:10px;">
                                    <input type="number" class="item-start-year" value="${item.start_date ? item.start_date.split('-')[0] : ''}" placeholder="Start Year" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="number" class="item-end-year" value="${item.end_date ? item.end_date.split('-')[0] : ''}" placeholder="End (Blank=Present)" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-id" value="${item.descId || ''}" placeholder="Description (ID)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-en" value="${item.descEn || ''}" placeholder="Description (EN)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <button type="button" onclick="this.parentElement.remove()" style="background:#ef4444; color:#fff; border:none; border-radius:6px; padding:0 12px; cursor:pointer;">X</button>
                                </div>
                            `);
                        });
                    }

                    // Populate orgs
                    const orgList = document.getElementById('peopleOrgList2');
                    orgList.innerHTML = '';
                    if(personData.organization_history) {
                        personData.organization_history.forEach(item => {
                            orgList.insertAdjacentHTML('beforeend', `
                                <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:10px; border-bottom:1px solid #f3f4f6; padding-bottom:10px;">
                                    <input type="number" class="item-start-year" value="${item.start_date ? item.start_date.split('-')[0] : ''}" placeholder="Start Year" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="number" class="item-end-year" value="${item.end_date ? item.end_date.split('-')[0] : ''}" placeholder="End (Blank=Present)" min="1900" max="2100" style="flex:1; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-id" value="${item.descId || ''}" placeholder="Description (ID)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <input type="text" class="item-desc-en" value="${item.descEn || ''}" placeholder="Description (EN)" style="flex:2; padding: 8px; border:1px solid #d1d5db; border-radius:6px;">
                                    <button type="button" onclick="this.parentElement.remove()" style="background:#ef4444; color:#fff; border:none; border-radius:6px; padding:0 12px; cursor:pointer;">X</button>
                                </div>
                            `);
                        });
                    }

                    // Set image
                    if(personData.image) {
                        let filename = personData.image.split('/').pop();
                        peopleImagePreview2.src = "{{ route('admin.aboutus.people.view', ['filename' => 'DUMMY']) }}".replace('DUMMY', filename);
                        peopleImageName2.textContent = 'Current Image';
                        peopleImageEmpty2.style.display = 'none';
                        peopleImageItem2.style.display = 'flex';
                    }

                    peopleFormSection2.style.display = 'block';
                }
            });
        });

        // Open form handler
        if (openPeopleBtn1) {
            openPeopleBtn1.addEventListener('click', (e) => {
                e.preventDefault();
                editMode1 = false;
                editPersonId1 = null;
                peopleFormTitle1.textContent = 'Add New People';
                peopleName1.value = '';
                peoplePosition1.value = '';
                document.getElementById('peoplePositionEn').value = '';
                document.getElementById('peopleSummary').value = '';
                document.getElementById('peopleSummaryEn').value = '';
                document.getElementById('peopleCvMode').value = 'both';
                document.getElementById('peopleStartDate').value = '';
                document.getElementById('peopleEndDate').value = '';
                document.getElementById('peopleCareerList').innerHTML = '';
                document.getElementById('peopleOrgList').innerHTML = '';
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
                const positionEn = document.getElementById('peoplePositionEn').value.trim();
                const summary = document.getElementById('peopleSummary').value.trim();
                const summaryEn = document.getElementById('peopleSummaryEn').value.trim();
                const cvMode = document.getElementById('peopleCvMode').value.trim();
                const startDate = document.getElementById('peopleStartDate').value.trim();
                const endDate = document.getElementById('peopleEndDate').value.trim();
                const careerHistoryData = extractDynamicList('peopleCareerList');
                const orgHistoryData = extractDynamicList('peopleOrgList');
                const fullBodyImageInput = document.getElementById('peopleFullBodyImageInput');

                if (!name || !position) {
                    alert('Please fill in all fields');
                    return;
                }

                if (!peopleImageInput1.files[0] && !editMode1) {
                    alert('Please upload an image');
                    return;
                }

                // Create FormData
                const formData = new FormData();
                formData.append('type', 'direksi');
                formData.append('name', name);
                formData.append('position', position);
                if (positionEn) formData.append('position_en', positionEn);
                if (summary) formData.append('summary', summary);
                if (summaryEn) formData.append('summary_en', summaryEn);
                if (cvMode) formData.append('cv_mode', cvMode);
                if (startDate) formData.append('start_date', startDate);
                if (endDate) formData.append('end_date', endDate);
                if (careerHistoryData) formData.append('career_history', careerHistoryData);
                if (orgHistoryData) formData.append('organization_history', orgHistoryData);
                if(peopleImageInput1.files[0]) formData.append('image', peopleImageInput1.files[0]);
                if (fullBodyImageInput.files[0]) formData.append('full_body_image', fullBodyImageInput.files[0]);

                let url = '{{ route('admin.aboutus.people.store') }}';
                if (editMode1) {
                    url = '{{ route("admin.aboutus.people.update", ["person" => "DUMMY_ID"]) }}'.replace('DUMMY_ID', editPersonId1);
                }

                // POST to server
                fetch(url, {
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
        let editPersonId2 = null;

        // Open form handler
        if (openPeopleBtn2) {
            openPeopleBtn2.addEventListener('click', (e) => {
                e.preventDefault();
                editMode2 = false;
                editPersonId2 = null;
                peopleFormTitle2.textContent = 'Add New People';
                peopleName2.value = '';
                peoplePosition2.value = '';
                document.getElementById('peoplePositionEn2').value = '';
                document.getElementById('peopleSummary2').value = '';
                document.getElementById('peopleSummaryEn2').value = '';
                document.getElementById('peopleCvMode2').value = 'both';
                document.getElementById('peopleStartDate2').value = '';
                document.getElementById('peopleEndDate2').value = '';
                document.getElementById('peopleCareerList2').innerHTML = '';
                document.getElementById('peopleOrgList2').innerHTML = '';
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
                const positionEn = document.getElementById('peoplePositionEn2').value.trim();
                const summary2 = document.getElementById('peopleSummary2').value.trim();
                const summaryEn2 = document.getElementById('peopleSummaryEn2').value.trim();
                const cvMode2 = document.getElementById('peopleCvMode2').value.trim();
                const startDate = document.getElementById('peopleStartDate2').value.trim();
                const endDate = document.getElementById('peopleEndDate2').value.trim();
                const careerHistoryData = extractDynamicList('peopleCareerList2');
                const orgHistoryData = extractDynamicList('peopleOrgList2');
                const fullBodyImageInput = document.getElementById('peopleFullBodyImageInput2');

                if (!name || !position) {
                    alert('Please fill in all fields');
                    return;
                }

                if (!peopleImageInput2.files[0] && !editMode2) {
                    alert('Please upload an image');
                    return;
                }

                // Create FormData
                const formData = new FormData();
                formData.append('type', 'komisaris');
                formData.append('name', name);
                formData.append('position', position);
                if (positionEn) formData.append('position_en', positionEn);
                if (summary2) formData.append('summary', summary2);
                if (summaryEn2) formData.append('summary_en', summaryEn2);
                if (cvMode2) formData.append('cv_mode', cvMode2);
                if (startDate) formData.append('start_date', startDate);
                if (endDate) formData.append('end_date', endDate);
                if (careerHistoryData) formData.append('career_history', careerHistoryData);
                if (orgHistoryData) formData.append('organization_history', orgHistoryData);
                if(peopleImageInput2.files[0]) formData.append('image', peopleImageInput2.files[0]);
                if (fullBodyImageInput.files[0]) formData.append('full_body_image', fullBodyImageInput.files[0]);

                let url2 = '{{ route('admin.aboutus.people.store') }}';
                if (editMode2) {
                    url2 = '{{ route("admin.aboutus.people.update", ["person" => "DUMMY_ID"]) }}'.replace('DUMMY_ID', editPersonId2);
                }

                // POST to server
                fetch(url2, {
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

        // ===== HISTORY POPUP CONFIRM (SAVE) =====
        const confirmHistoryBtn = document.getElementById('confirmHistoryBtn');
        let editHistoryId = null;

        // When clicking a history card, open popup in edit mode
        document.querySelectorAll('.history-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Don't trigger if clicking the delete button
                if (e.target.closest('.history-delete-btn')) return;

                editHistoryMode = true;
                editHistoryId = this.dataset.id || null;
                historyPopupTitle.innerText = 'Edit History';
                historyTitleInput.value = this.querySelector('.history-card-title')?.textContent || '';
                historyTitleEnInput.value = this.dataset.titleEn || '';
                historyYearInput.value = this.querySelector('.history-card-year')?.textContent || '';
                historyDescriptionInput.value = this.querySelector('.history-card-description')?.textContent || '';
                historyDescriptionEnInput.value = this.dataset.descriptionEn || '';
                deleteHistoyBtn.style.display = 'inline-block';

                // Reset image preview
                imageInput.value = '';
                const cardImg = this.querySelector('.history-card-image');
                if (cardImg) {
                    emptyState.style.display = 'none';
                    itemState.style.display = 'flex';
                    previewImg.src = cardImg.src;
                    fileNameEl.textContent = 'Current image';
                } else {
                    emptyState.style.display = 'flex';
                    itemState.style.display = 'none';
                    previewImg.src = '';
                    fileNameEl.textContent = '';
                }

                historyPopup.style.display = 'flex';
            });
        });

        if (confirmHistoryBtn) {
            confirmHistoryBtn.addEventListener('click', () => {
                const title = historyTitleInput.value.trim();
                const titleEn = historyTitleEnInput.value.trim();
                const year = historyYearInput.value.trim();
                const description = historyDescriptionInput.value.trim();
                const descriptionEn = historyDescriptionEnInput.value.trim();

                if (!title || !description) {
                    alert('Please fill in Title and Description');
                    return;
                }

                const formData = new FormData();
                formData.append('title', title);
                if (titleEn) formData.append('title_en', titleEn);
                formData.append('year', year);
                formData.append('description', description);
                if (descriptionEn) formData.append('description_en', descriptionEn);

                if (imageInput.files[0]) {
                    formData.append('image', imageInput.files[0]);
                }

                fetch('{{ route('admin.aboutus.history.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Server error');
                        alert('History saved successfully!');
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error saving history');
                    });
            });
        }

        // ===== HISTORY DELETE (popup delete button) =====
        if (deleteHistoyBtn) {
            deleteHistoyBtn.addEventListener('click', () => {
                if (!editHistoryId) {
                    alert('No history selected for deletion');
                    return;
                }

                if (!confirm('Delete this history?')) return;

                fetch('{{ url('/admin/aboutus/history') }}/' + editHistoryId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Server error');
                        alert('History deleted successfully!');
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error deleting history');
                    });
            });
        }

        // ===== HISTORY DELETE (card hover button) =====
        document.querySelectorAll('.history-delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const historyId = this.dataset.id;

                if (!confirm('Delete this history?')) return;

                fetch('{{ url('/admin/aboutus/history') }}/' + historyId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Server error');
                        alert('History deleted successfully!');
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error deleting history');
                    });
            });
        });

        // Delete event handlers for direction cards
        document.querySelectorAll('.direction-delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const personId = this.dataset.id;

                if (confirm('Delete this person?')) {
                    fetch('{{ url('/admin/aboutus/people') }}/' + personId, {
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
