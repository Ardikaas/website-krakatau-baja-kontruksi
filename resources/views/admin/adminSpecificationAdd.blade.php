@extends('layouts.admin')

@section('title', 'Admin Products Editor')

@section('content')
    <div class="admin-specifications-page">
        <div class="main-container">
            <section class="admin-add-specifications">

                {{-- HEADER --}}
                <header class="page-header">
                    <h1>Products Editor</h1>
                </header>

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
                
                {{-- BASIC INFO --}}
                <section class="spec-section">
                    <h2 class="section-title">Basic Info</h2>

                    <div class="info-grid">
                        <div class="info-group">
                            <label>Title</label>
                            <input type="text" placeholder="Equal Angles">

                            <label>Description</label>
                            <textarea name="description" rows="4" required></textarea>
                        </div>
                    </div>
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
                            <div class="file-item"
                                data-id="1"
                                data-file="First-table.xlsx"
                                data-title="According to SNI 07-2054-2006">

                                <span>According to SNI 07-2054-2006</span>

                                <div class="file-actions">
                                    <img class="btn-edit"
                                        src="{{ asset('images/icons/img_pencil_streamline.svg') }}"
                                        alt="Edit">

                                    <img class="btn-delete"
                                        src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}"
                                        alt="Delete">
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

                <div class="tableSpec-overlay" id="editSpec">
                    <div class="tableSpec-box">
                        <h3 class="tableSpec-title">Edit Table Information</h3>
                
                        <input type="hidden" id="edit-id">
                
                        <div class="tableSpec-field">
                            <label>Table File</label>
                            <input type="text" id="edit-file">
                        </div>
                
                        <div class="tableSpec-field">
                            <label>Title Text</label>
                            <input type="text" id="edit-title">
                        </div>
                
                        <div class="tableSpec-actions">
                            <button class="btn-cancel" id="closeSpec">Cancel</button>
                            <button class="btn-confirm" id="confirmEdit">Confirm</button>
                        </div>
                    </div>
                </div>
                
            </section>
        </div>
    </div>
    <script>
        const modal = document.getElementById('editSpec');
        const closeModal = document.getElementById('closeSpec');
    
        const inputId = document.getElementById('edit-id');
        const inputFile = document.getElementById('edit-file');
        const inputTitle = document.getElementById('edit-title');
    
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const item = e.target.closest('.file-item');
    
                inputId.value = item.dataset.id;
                inputFile.value = item.dataset.file;
                inputTitle.value = item.dataset.title;
    
                modal.style.display = 'flex';
            });
        });
    
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.style.display = 'none';
        });
    </script>
@endsection
