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

            {{-- IMAGE --}}
            <div class="project-editor-card">
                <label class="project-editor-label">Image Thumbnail</label>
                <div class="project-editor-upload" style="position:relative" id="uploadContainer">
                    <input type="file" name="image" accept="image/*" class="project-editor-file-input"
                        onchange="previewProjectImage(this)"
                        style="position:absolute; inset:0; opacity:0; cursor:pointer; z-index:5;">
                    <div class="project-editor-upload-inner" id="uploadInner">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="upload-preview"
                                style="max-width:200px; max-height:200px; object-fit:cover; border-radius:8px; display:block; margin:0 auto;">
                            <p class="upload-text" id="uploadText">Current image: {{ basename($project->image) }}</p>
                        @else
                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}" class="upload-icon">
                            <p class="upload-text" id="uploadText">
                                Drop your image here, or <span class="link-text">Click to browse</span>
                            </p>
                        @endif
                    </div>
                </div>
                <p class="project-editor-helper">Upload a project thumbnail image. Max size: 2MB. Supported formats: JPG,
                    PNG.</p>
                <div id="fileError" class="error-message"
                    style="color: #dc2626; font-size: 14px; margin-top: 8px; display: none;"></div>
            </div>

            {{-- INPUTS --}}
            @php
                $value = fn($field) => old($field, $project->$field ?? '');
            @endphp

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Project Title</label>
                    <input type="text" name="title" class="project-editor-input form-control"
                        value="{{ $value('title') }}" required>
                </div>
            </div>

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Category</label>
                    <input type="text" name="category" class="project-editor-input form-control"
                        value="{{ $value('category') }}" required>
                </div>
            </div>

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Client</label>
                    <input type="text" name="client" class="project-editor-input form-control"
                        value="{{ $value('client') }}" required>
                </div>
            </div>

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Location</label>
                    <input type="text" name="location" class="project-editor-input form-control"
                        value="{{ $value('location') }}" required>
                </div>
            </div>

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Date</label>
                    <input type="datetime-local" name="date" class="project-editor-input form-control"
                        value="{{ old('date', $project->date ? $project->date->format('Y-m-d\TH:i') : '') }}" required>
                </div>
            </div>

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Description</label>
                    <textarea name="description" class="project-editor-input form-control" rows="4" required>{{ $value('description') }}</textarea>
                </div>
            </div>

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Scope of Work</label>
                    <textarea name="scope_of_work" class="project-editor-input form-control" rows="4" required>{{ $value('scope_of_work') }}</textarea>
                </div>
            </div>

            <div class="project-editor-card">
                <div class="project-editor-field">
                    <label class="project-editor-label">Challenges</label>
                    <textarea name="challenges" class="project-editor-input form-control" rows="4" required>{{ $value('challenges') }}</textarea>
                </div>
            </div>

            {{-- SOLUTIONS --}}
            <div class="project-editor-card">
                <label class="project-editor-label">Solutions</label>
                <div id="solutionsWrapper">
                    @php
                        $solutions = old(
                            'solutions',
                            $project->solutions ?? [
                                ['title' => '', 'description' => ''],
                                ['title' => '', 'description' => ''],
                            ],
                        );
                    @endphp
                    @foreach ($solutions as $i => $solution)
                        <div class="solution-card">
                            <div class="solution-field">
                                <label class="solution-label">Solution Title</label>
                                <input type="text" name="solutions[{{ $i }}][title]"
                                    class="form-control solution-title" value="{{ $solution['title'] }}" required>
                            </div>

                            <div class="solution-field mt-2">
                                <label class="solution-label">Solution Description</label>
                                <textarea name="solutions[{{ $i }}][description]" class="form-control solution-desc" rows="3"
                                    required>{{ $solution['description'] }}</textarea>
                            </div>
                        </div>
                    @endforeach
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

    <script>
        function previewProjectImage(input) {
            const file = input.files[0];
            const uploadInner = document.getElementById('uploadInner');
            const uploadText = document.getElementById('uploadText');
            const fileError = document.getElementById('fileError');

            // Hide any previous error
            fileError.style.display = 'none';

            if (file) {
                // Validate file size (2MB max)
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes
                if (file.size > maxSize) {
                    fileError.textContent = 'File size must be less than 2MB';
                    fileError.style.display = 'block';
                    input.value = ''; // Clear the input
                    return;
                }

                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    fileError.textContent = 'Only JPG and PNG files are allowed';
                    fileError.style.display = 'block';
                    input.value = ''; // Clear the input
                    return;
                }

                // Create image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    uploadInner.innerHTML = `
                        <img src="${e.target.result}" class="upload-preview" style="max-width:200px; max-height:200px; object-fit:cover; border-radius:8px; display:block; margin:0 auto;">
                        <p class="upload-text" id="uploadText" style="text-align:center; margin-top:8px;">File selected: ${file.name}</p>
                        <button type="button" onclick="clearImage()" style="margin-top:8px; padding:4px 8px; background:#dc2626; color:white; border:none; border-radius:4px; cursor:pointer; font-size:12px;">Remove</button>
                    `;
                };
                reader.readAsDataURL(file);

                // Don't disable the input - allow user to change file if needed
                // input.disabled = true;
            }
        }

        function clearImage() {
            const uploadInner = document.getElementById('uploadInner');
            const fileInput = document.querySelector('input[name="image"]');
            const fileError = document.getElementById('fileError');

            // Clear the file input
            fileInput.value = '';

            // Reset to initial state
            uploadInner.innerHTML = `
                <img src="{{ asset('images/icons/img_upload_computer.svg') }}" class="upload-icon">
                <p class="upload-text" id="uploadText">
                    Drop your image here, or <span class="link-text">Click to browse</span>
                </p>
            `;

            // Hide any error
            fileError.style.display = 'none';
        }
    </script>
@endsection
