@extends('layouts.admin')

@section('title', 'Admin Products Editor')

@section('content')
    <div class="admin-specifications-page">
        <div class="main-container">
            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <section class="admin-add-specifications">

                    {{-- HEADER --}}
                    <header class="page-header">
                        <h1>Products Editor</h1>
                    </header>

                    {{-- IMAGE --}}
                    <section class="spec-section">
                        <h2 class="section-title">Image</h2>

                        <div class="upload-list" id="imageUploadList">

                            <div class="upload-item" data-template>
                                <input type="file" name="images[]" accept="image/*" hidden>

                                <div class="upload-thumb">
                                    <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="preview">
                                </div>

                                <div class="upload-info">
                                    <p>Drop image here or <span>browse</span></p>
                                    <small>JPG, PNG (max 2MB)</small>
                                </div>

                                <button class="btn-delete-img" type="button">✕</button>
                            </div>

                            <button class="btn-add-image" type="button" id="addImageBtn">+ Add Image</button>
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
                                <label>Title (Bahasa Indonesia)</label>
                                <input type="text" name="name" required>

                                <label>Title (English)</label>
                                <input type="text" name="name_en">

                                <label>Category</label>
                                <input type="text" name="category" required>

                                <label>Description (Bahasa Indonesia)</label>
                                <textarea name="description" rows="4" required></textarea>

                                <label>Description (English)</label>
                                <textarea name="description_en" rows="4"></textarea>
                            </div>
                        </div>
                    </section>

                    {{-- TABLE --}}
                    <section class="spec-section">
                        <h2 class="section-title">Table Informations</h2>

                        <div class="table-wrap">

                            <div class="file-list" id="tableImageList">

                                {{-- FILE ITEM --}}
                                <div class="file-item" id="tableItem">
                                    <span class="file-title">Table Image</span>

                                    <div class="file-actions">
                                        <input type="file" name="spec_image" accept="image/*" hidden>
                                        <button type="button" class="btn-add-table">+ Add Table (Image)</button>
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
            </form>
        </div>
    </div>
    <script>
        const modal = document.getElementById('editSpec');
        const closeModal = document.getElementById('closeSpec');

        const inputId = document.getElementById('edit-id');
        const inputFile = document.getElementById('edit-file');
        const inputTitle = document.getElementById('edit-title');
        const uploadList = document.getElementById('imageUploadList');
        const addBtn = document.getElementById('addImageBtn');
        const MAX_IMAGE = 3;
        const DEFAULT_ICON = "{{ asset('images/icons/img_upload_computer.svg') }}";
        const tableItem = document.getElementById('tableItem');
        const input = tableItem.querySelector('input[type="file"]');
        const title = tableItem.querySelector('.file-title');
        const btnAdd = tableItem.querySelector('.btn-add-table');
        const btnDelete = tableItem.querySelector('.btn-delete');
        const MAX_FILE_SIZE = 2 * 1024 * 1024;

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

        function getItems() {
            return uploadList.querySelectorAll('.upload-item:not([data-template])');
        }

        function createUploadItem() {
            const template = uploadList.querySelector('[data-template]');
            const item = template.cloneNode(true);
            item.removeAttribute('data-template');

            const input = item.querySelector('input');
            const img = item.querySelector('.upload-thumb img');
            const deleteBtn = item.querySelector('.btn-delete-img');

            input.value = '';
            img.src = DEFAULT_ICON;

            // open file
            item.addEventListener('click', (e) => {
                if (!e.target.classList.contains('btn-delete-img')) {
                    input.click();
                }
            });

            // preview
            input.addEventListener('change', () => {
                const file = input.files[0];
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    alert('File harus berupa gambar (JPG / PNG)');
                    input.value = '';
                    img.src = DEFAULT_ICON;
                    return;
                }

                if (file.size > MAX_FILE_SIZE) {
                    alert('Ukuran gambar maksimal 2MB');
                    input.value = '';
                    img.src = DEFAULT_ICON;
                    return;
                }

                const reader = new FileReader();
                reader.onload = e => img.src = e.target.result;
                reader.readAsDataURL(file);
            });

            // delete (BOLEH SAMPAI 0)
            deleteBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                item.remove();
                toggleAddButton();
            });

            return item;
        }

        function toggleAddButton() {
            addBtn.style.display = getItems().length >= MAX_IMAGE ? 'none' : 'inline-block';
        }

        toggleAddButton();

        addBtn.addEventListener('click', () => {
            if (getItems().length < MAX_IMAGE) {
                uploadList.insertBefore(createUploadItem(), addBtn);
                toggleAddButton();
            }
        });

        function resetTableImage() {
            input.value = '';
            title.textContent = 'Table Image';
            btnAdd.style.display = 'inline-block';
            btnDelete.style.display = 'none';
        }

        // ADD
        btnAdd.addEventListener('click', () => {
            input.click();
        });

        // FILE SELECTED
        input.addEventListener('change', () => {
            const file = input.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('File harus berupa gambar (JPG / PNG)');
                resetTableImage();
                return;
            }

            if (file.size > MAX_FILE_SIZE) {
                alert('Ukuran gambar maksimal 2MB');
                resetTableImage();
                return;
            }

            title.textContent = file.name;
            btnAdd.style.display = 'none';
            btnDelete.style.display = 'inline-block';
        });

        // DELETE (RESET, NOT REMOVE)
        btnDelete.addEventListener('click', () => {
            resetTableImage();
        });

        // INIT
        resetTableImage();
    </script>
@endsection
