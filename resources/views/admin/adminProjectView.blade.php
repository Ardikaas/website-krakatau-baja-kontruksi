@extends('layouts.admin')

@section('title','Projects')

@section('content')
<div class="admin-project-list">

    {{-- HEADER --}}
    <header class="admin-project-header">
        <h1 class="admin-project-title">
            Project Manager
        </h1>
    </header>

    <div class="default-header">
        <h5 class="default-sec-title">Projects</h5>
        <a href="{{ route('admin.projects.create') }}" class="add-btn">
            <span class="add-icon">+</span>
            Add Project
        </a>
    </div>

    {{-- EMPTY STATE --}}
    @if($projects->isEmpty())
        <p>No projects yet. Click "Add Project" to create one.</p>
    @endif

    {{-- PROJECT GRID --}}
    <div class="project-card-grid gap-3">
        @foreach($projects as $project)
        <div class="project-card border p-2 rounded" 
             onclick="window.location='{{ route('admin.projects.edit', $project) }}'" 
             style="cursor:pointer; transition:0.2s; overflow:hidden;">
            
            {{-- IMAGE --}}
            <img src="{{ $project->image ? asset('storage/'.$project->image) : asset('images/default_project.png') }}" 
                 alt="{{ $project->title }}" >

            {{-- BODY --}}
            <div class="project-card-body mt-2">
                <h5>{{ $project->title }}</h5>
                <p class="text-muted">{{ $project->category }}</p>

                {{-- ACTIONS --}}
                <div class="card-actions d-flex gap-1" onclick="event.stopPropagation();">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
