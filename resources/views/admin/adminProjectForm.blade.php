@extends('layouts.admin')

@section('title', $project->exists ? 'Edit Project' : 'Add Project')

@section('content')
<div class="admin-project">
    <section class="admin-project-details">

        {{-- HEADER --}}
        <header class="admin-project-header">
            <h1 class="admin-project-title">
                {{ $project->exists ? 'Edit Project' : 'Add Project' }}
            </h1>
        </header>

        {{-- FORM --}}
        <form
            action="{{ $project->exists
                ? route('admin.projects.update', $project->id)
                : route('admin.projects.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @if($project->exists)
                @method('PUT')
            @endif

            {{-- IMAGE --}}
            <div class="admin-project-image-upload mb-3">
                <label class="admin-project-label">Image Thumbnail</label>
                <div class="project-image-upload" style="position:relative">
                    <input type="file" name="image" accept="image/*"
                        class="project-image-input"
                        style="position:absolute; inset:0; opacity:0; cursor:pointer">
                    <div class="project-image-upload-inner">
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" class="upload-preview" style="max-width:200px; display:block;">
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

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Project Title</label>
                <input type="text" name="title" class="project-detail-input form-control" value="{{ $value('title') }}">
            </div>

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Category</label>
                <input type="text" name="category" class="project-detail-input form-control" value="{{ $value('category') }}">
            </div>

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Client</label>
                <input type="text" name="client" class="project-detail-input form-control" value="{{ $value('client') }}">
            </div>

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Location</label>
                <input type="text" name="location" class="project-detail-input form-control" value="{{ $value('location') }}">
            </div>

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Date</label>
                <input type="datetime-local" name="date" class="project-detail-input form-control"
                       value="{{ old('date', $project->date ? $project->date->format('Y-m-d\TH:i') : '') }}">
            </div>

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Description</label>
                <textarea name="description" class="project-detail-input form-control">{{ $value('description') }}</textarea>
            </div>

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Scope of Work</label>
                <textarea name="scope_of_work" class="project-detail-input form-control">{{ $value('scope_of_work') }}</textarea>
            </div>

            <div class="project-detail-field mb-3">
                <label class="admin-project-label">Challenges</label>
                <textarea name="challenges" class="project-detail-input form-control">{{ $value('challenges') }}</textarea>
            </div>

            {{-- SOLUTIONS --}}
            <div class="project-solutions-section mb-4">
                <h3 class="admin-project-label">Solutions</h3>
                <div id="solutionsWrapper">
                    @php
                        $solutions = old('solutions', $project->solutions ?? [['title'=>'','description'=>''],['title'=>'','description'=>'']]);
                    @endphp
                    @foreach($solutions as $i => $solution)
                        <div class="solution-card mb-3">
                            <div class="solution-field">
                                <label class="solution-label">Solution Title</label>
                                <input type="text" name="solutions[{{ $i }}][title]" class="form-control solution-title" value="{{ $solution['title'] }}">
                            </div>
            
                            <div class="solution-field mt-2">
                                <label class="solution-label">Solution Description</label>
                                <textarea name="solutions[{{ $i }}][description]" class="form-control solution-desc">{{ $solution['description'] }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>            
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="form-actions mt-4 d-flex gap-2">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">
                    {{ $project->exists ? 'Back' : 'Cancel' }}
                </a>
                <button type="submit" class="btn add-btn">
                    {{ $project->exists ? 'Save Changes' : 'Save Project' }}
                </button>
            </div>        
        </form>

        {{-- DELETE BUTTON --}}
        @if($project->exists)
        <form action="{{ route('admin.projects.destroy', $project->id) }}"
            method="POST"
            onsubmit="return confirm('Delete this project?')"
            class="mt-2"
        >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Project</button>
        </form>
        @endif

    </section>
</div>
@endsection
