@extends('layouts.front')

@section('title', 'Project - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/project.css'])
@endpush

@section('content')
    {{-- Banner --}}
    <x-landingPageSection1 type="page" title="{{ __('messages.page_project') }}" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => __('messages.page_project')]]" imagePath="images/background/page-title.jpg" />

    {{-- Project Grid --}}
    <section class="project-section">
        <div class="auto-container">

            @if ($projects->isEmpty())
                <div class="project-empty-state">
                    <p>{{ __('messages.no_projects_yet') }}</p>
                </div>
            @else
                <div class="project-grid">
                    @foreach ($projects as $project)
                        @php
                            $firstImage = $project->images[0] ?? null;
                        @endphp
                        <div class="project-card-wrapper">
                            <a href="{{ route('front.projects.show', $project) }}" class="project-card-link">
                                <div class="project-card">
                                    {{-- IMAGE --}}
                                    <div class="project-card-image"
                                        style="background-image:url({{ $firstImage ? route('admin.projects.view', ['filename' => basename($firstImage)]) : asset('images/default_project.png') }});">
                                    </div>

                                    {{-- BODY --}}
                                    <div class="project-card-body">
                                        <h3 class="project-card-title">{{ $project->translated_title }}</h3>

                                        <div class="project-card-meta">
                                            <span class="project-card-what">
                                                <i class="flaticon-nut"></i>
                                                {{ $project->translated_what }}
                                            </span>
                                            <span class="project-card-location">
                                                <i class="flaticon-home"></i>
                                                {{ $project->translated_location }}
                                            </span>
                                        </div>

                                        <p class="project-card-desc">{{ $project->translated_description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
@endsection
