@extends('layouts.admin')

@section('title', $project->exists ? 'Edit Project' : 'Add Project')

@push('styles')
    @vite(['resources/css/adminProjectForm.css'])
@endpush

@section('content')
    <section class="admin-project-add">

        <div class="add-project-header">
            <h1 class="project-editor-title">{{ $project->exists ? 'Edit Project' : 'Add Project' }}</h1>
        </div>

        {{-- FORM --}}
        <form action="{{ $project->exists ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($project->exists)
                @method('PUT')
            @endif

            {{-- IMAGES --}}
            <div class="project-editor-card">
                <label class="project-editor-label">Images (min 1, max 3)</label>

                {{-- Existing images --}}
                @if ($project->exists && $project->images)
                    <div class="existing-images-grid" id="existingImagesGrid">
                        @foreach ($project->images as $img)
                            <div class="existing-image-item" data-path="{{ $img }}">
                                <img src="{{ route('admin.projects.view', ['filename' => basename($img)]) }}"
                                    alt="Project Image">
                                <input type="hidden" name="existing_images[]" value="{{ $img }}">
                                <button type="button" class="remove-existing-btn" onclick="removeExistingImage(this)">&times;</button>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- New images upload --}}
                <div class="project-editor-upload" id="uploadContainer" style="position:relative; overflow:hidden;">
                    <input type="file" name="new_images[]" accept="image/jpeg,image/png" multiple
                        class="project-editor-file-input" onchange="previewNewImages(this)"
                        style="position:absolute; inset:0; width:100%; height:100%; opacity:0; cursor:pointer; z-index:5;">
                    <div class="project-editor-upload-inner" id="uploadInner">
                        <img src="{{ asset('images/icons/img_upload_computer.svg') }}" class="upload-icon">
                        <p class="upload-text">
                            Drop your images here, or <span class="link-text">Click to browse</span>
                        </p>
                    </div>
                </div>

                {{-- New image previews --}}
                <div class="new-images-preview" id="newImagesPreview"></div>

                <p class="project-editor-helper">Upload 1-3 project images. Max size: 2MB each. Formats: JPG, PNG.</p>
                <div id="fileError" class="error-message"
                    style="color: #dc2626; font-size: 14px; margin-top: 8px; display: none;"></div>
            </div>

            {{-- INPUTS --}}
            @php
                $value = fn($field) => old($field, $project->$field ?? '');
            @endphp

            {{-- TITLE --}}
            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Nama Project (ID) *</label>
                    <input type="text" name="title" class="project-editor-input form-control"
                        value="{{ $value('title') }}" required>
                </div>
                <div class="project-editor-field mt-3">
                    <label class="project-editor-label">Project Name (EN)</label>
                    <input type="text" name="title_en" class="project-editor-input form-control"
                        value="{{ $value('title_en') }}">
                </div>
            </div>

            {{-- WHAT --}}
            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Yang Dibuat (ID) * <small style="color:#888">Contoh: Jembatan Baja, Masjid Baja</small></label>
                    <input type="text" name="what" class="project-editor-input form-control"
                        value="{{ $value('what') }}" required>
                </div>
                <div class="project-editor-field mt-3">
                    <label class="project-editor-label">What Was Built (EN)</label>
                    <input type="text" name="what_en" class="project-editor-input form-control"
                        value="{{ $value('what_en') }}">
                </div>
            </div>

            {{-- LOCATION --}}
            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Lokasi (ID) * <small style="color:#888">Lokasi atau nama PT</small></label>
                    <input type="text" name="location" class="project-editor-input form-control"
                        value="{{ $value('location') }}" required>
                </div>
                <div class="project-editor-field mt-3">
                    <label class="project-editor-label">Location (EN)</label>
                    <input type="text" name="location_en" class="project-editor-input form-control"
                        value="{{ $value('location_en') }}">
                </div>
            </div>

            {{-- DESCRIPTION --}}
            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Deskripsi (ID) *</label>
                    <textarea name="description" class="project-editor-input form-control" rows="4" required>{{ $value('description') }}</textarea>
                </div>
                <div class="project-editor-field mt-3">
                    <label class="project-editor-label">Description (EN)</label>
                    <textarea name="description_en" class="project-editor-input form-control" rows="4">{{ $value('description_en') }}</textarea>
                </div>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="project-editor-actions">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    {{ $project->exists ? 'Back' : 'Cancel' }}
                </a>
                <button type="submit" class="project-save-btn">
                    {{ $project->exists ? 'Save Changes' : 'Save Project' }}
                </button>
            </div>
        </form>

        {{-- DELETE BUTTON --}}
        @if ($project->exists)
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                onsubmit="return confirm('Delete this project?')" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Project</button>
            </form>
        @endif

    </section>

    <style>
        .existing-images-grid {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }
        .existing-image-item {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid var(--color-e5e7eb, #e5e7eb);
        }
        .existing-image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .remove-existing-btn {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: none;
            background: #dc2626;
            color: #fff;
            font-size: 18px;
            line-height: 28px;
            text-align: center;
            cursor: pointer;
            padding: 0;
        }
        .new-images-preview {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 12px;
        }
        .new-preview-item {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid var(--color-06b6d4, #06b6d4);
        }
        .new-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <script>
        function removeExistingImage(btn) {
            const item = btn.closest('.existing-image-item');
            item.remove();
            updateImageCount();
        }

        function previewNewImages(input) {
            const preview = document.getElementById('newImagesPreview');
            const fileError = document.getElementById('fileError');
            fileError.style.display = 'none';
            preview.innerHTML = '';

            const existingCount = document.querySelectorAll('.existing-image-item').length;
            const maxNew = 3 - existingCount;

            if (input.files.length > maxNew) {
                fileError.textContent = `Maksimal total 3 gambar. Anda sudah punya ${existingCount} gambar, hanya bisa menambah ${maxNew} lagi.`;
                fileError.style.display = 'block';
                input.value = '';
                return;
            }

            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];

                if (file.size > 2 * 1024 * 1024) {
                    fileError.textContent = `File "${file.name}" terlalu besar. Maksimal 2MB.`;
                    fileError.style.display = 'block';
                    input.value = '';
                    preview.innerHTML = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'new-preview-item';
                    div.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }

        function updateImageCount() {
            const existing = document.querySelectorAll('.existing-image-item').length;
            const fileInput = document.querySelector('input[name="new_images[]"]');
            // Reset file input when existing images change
            if (fileInput) fileInput.value = '';
            document.getElementById('newImagesPreview').innerHTML = '';
        }
    </script>
@endsection
