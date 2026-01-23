@extends('layouts.admin')

@section('title','Projects')

@section('content')
<div class="admin-project-list">
    <div class="list-header">
        <h1>Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="add-btn">+ Add Project</a>
    </div>

    <div class="project-card-grid">
        @foreach($projects as $project)
        <div class="project-card">
            <img src="{{ asset('storage/'.$project->image) }}" alt="">
            <div class="project-card-body">
                <h3>{{ $project->title }}</h3>
                <p>{{ $project->category }}</p>

                <div class="card-actions">
                    <a href="{{ route('admin.projects.edit',$project) }}">Edit</a>

                    <form method="POST" action="{{ route('admin.projects.destroy',$project) }}">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
