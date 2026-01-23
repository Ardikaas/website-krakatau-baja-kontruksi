@extends('layouts.admin')

@section('title', isset($project) ? 'Edit Project' : 'Add Project')

@section('content')
<div class="admin-project">
    <section class="admin-project-details">

        {{-- HEADER --}}
        <header class="admin-project-header">
            <h1 class="admin-project-title">
                {{ isset($project) ? 'Edit Project' : 'Add Project' }}
            </h1>
        </header>

        {{-- FORM --}}
        <form
            action="{{ isset($project)
                ? route('admin.projects.update', $project->id)
                : route('admin.projects.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @isset($project)
                @method('PUT')
            @endisset

            {{-- IMAGE --}}
            <div class="admin-project-image-upload">
                <label class="admin-project-label">Image Thumbnail</label>

                <div class="project-image-upload" style="position:relative">
                    <input type="file" name="image" accept="image/*"
                        class="project-image-input"
                        style="position:absolute; inset:0; opacity:0; cursor:pointer">

                    <div class="project-image-upload-inner">
                        @if(isset($project) && $project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" class="upload-preview">
                        @else
                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}">
                            <p>Drop your image or <span>Click to browse</span></p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- INPUTS --}}
            @php
                $value = fn($field) => old($field, $project->$field ?? '');
            @endphp

            <div class="project-detail-field">
                <label class="admin-project-label">Project Title</label>
                <input type="text" name="title" class="project-detail-input" value="{{ $value('title') }}">
            </div>

            <div class="project-detail-field">
                <label class="admin-project-label">Category</label>
                <input type="text" name="category" class="project-detail-input" value="{{ $value('category') }}">
            </div>

            <div class="project-detail-field">
                <label class="admin-project-label">Client</label>
                <input type="text" name="client" class="project-detail-input" value="{{ $value('client') }}">
            </div>

            <div class="project-detail-field">
                <label class="admin-project-label">Location</label>
                <input type="text" name="location" class="project-detail-input" value="{{ $value('location') }}">
            </div>

            <div class="project-detail-field">
                <label class="admin-project-label">Date</label>
                <input type="datetime-local" name="date"
                       class="project-detail-input"
                       value="{{ old('date', isset($project) ? \Carbon\Carbon::parse($project->date)->format('Y-m-d\TH:i') : '') }}">
            </div>

            <div class="project-detail-field">
                <label class="admin-project-label">Description</label>
                <textarea name="description" class="project-detail-input">{{ $value('description') }}</textarea>
            </div>

            <div class="project-detail-field">
                <label class="admin-project-label">Scope</label>
                <textarea name="scope" class="project-detail-input">{{ $value('scope') }}</textarea>
            </div>

            <div class="project-detail-field">
                <label class="admin-project-label">Challenges</label>
                <textarea name="challenges" class="project-detail-input">{{ $value('challenges') }}</textarea>
            </div>

            {{-- SOLUTIONS --}}
            <div class="project-solutions-section">
                <h3 class="admin-project-label">Solutions</h3>

                <div id="solutionsWrapper">
                    @forelse(old('solutions', $project->solutions ?? [ [] ]) as $i => $solution)
                        <div class="solution-form">
                            <input type="text"
                                   name="solutions[{{ $i }}][title]"
                                   class="project-detail-input"
                                   placeholder="Solution title"
                                   value="{{ $solution['title'] ?? '' }}">

                            <textarea name="solutions[{{ $i }}][description]"
                                      class="project-detail-input"
                                      placeholder="Solution description">{{ $solution['description'] ?? '' }}</textarea>
                        </div>
                    @empty
                    @endforelse
                </div>

                <button type="button" class="add-btn" onclick="addSolution()">+ Add Solution</button>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="form-actions" style="margin-top:40px; display:flex; gap:12px">
                <a href="{{ route('admin.projects.index') }}" class="btn-cancel">
                    {{ isset($project) ? 'Back' : 'Cancel' }}
                </a>

                <button type="submit" class="btn-save">
                    {{ isset($project) ? 'Save Changes' : 'Save Project' }}
                </button>

                @isset($project)
                    <form action="{{ route('admin.projects.destroy', $project->id) }}"
                          method="POST"
                          onsubmit="return confirm('Delete this project?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                @endisset
            </div>

        </form>
    </section>
</div>
@endsection
