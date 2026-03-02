@extends('layouts.admin')

@section('title', 'Projects')

@push('styles')
    @vite(['resources/css/adminProjectView.css'])
@endpush

@section('content')
    <div class="admin-project-page">
        <div class="main-container">
            <section class="admin-project-management">

                <div class="apm-header">
                    <h2 class="apm-page-title">Project Management</h2>
                </div>

                <div class="apm-grid">
                    <div class="apm-grid-header">
                        <h5 class="apm-grid-title">Projects</h5>

                        <a href="{{ route('admin.projects.create') }}" class="apm-add-btn">
                            <span class="apm-add-icon">+</span>
                            Add Project
                        </a>
                    </div>

                    {{-- EMPTY STATE --}}
                    @if ($projects->isEmpty())
                        <div class="apm-empty-state">
                            <p>No projects yet. Click "Add Project" to create one.</p>
                        </div>
                    @else
                        <div class="apm-card-grid">
                            @foreach ($projects as $project)
                                <div class="apm-card"
                                    onclick="window.location='{{ route('admin.projects.edit', $project) }}'"
                                    style="cursor:pointer;">
                                    <div class="apm-card-image-wrapper">
                                        <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/default_project.png') }}"
                                            alt="{{ $project->title }}" class="apm-card-image">
                                    </div>

                                    <div class="apm-card-content">
                                        <h3 class="apm-card-title">{{ $project->title }}</h3>
                                        <p class="apm-card-category">{{ $project->category }}</p>
                                        <p class="apm-card-client">{{ $project->client }}</p>
                                    </div>

                                    <div class="apm-card-actions">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="apm-edit-btn"
                                            onclick="event.stopPropagation();">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </section>
        </div>
    </div>
@endsection
