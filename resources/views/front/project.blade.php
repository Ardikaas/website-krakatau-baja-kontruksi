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
                            <div class="project-card-link" style="display: block; height: 100%;">
                                <div class="project-card">
                                    {{-- IMAGE --}}
                                    <a href="{{ route('front.projects.show', $project) }}" style="display: block; text-decoration: none;">
                                        <div class="project-card-image"
                                            style="background-image:url({{ $firstImage ? route('admin.projects.view', ['filename' => basename($firstImage)]) : asset('images/default_project.png') }});">
                                        </div>
                                    </a>

                                    {{-- BODY --}}
                                    <div class="project-card-body">
                                        <a href="{{ route('front.projects.show', $project) }}" style="color: inherit; text-decoration: none;">
                                            <h3 class="project-card-title">{{ $project->translated_title }}</h3>
                                        </a>

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

                                        {{-- CONTACT SALES --}}
                                        @if ($sales && $sales->count() > 0)
                                            <div class="sales-contact-list mt_15">
                                                @php $salesPerson = $sales->first(); @endphp
                                                <div class="sales-contact d-flex align-items-center mb_10" style="margin-bottom: 10px;">
                                                    <img src="{{ $salesPerson->photo ? route('sales.image', $salesPerson->photo) : 'https://placehold.co/100x100' }}"
                                                        alt="Sales" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 15px;">
                                                    <div class="sales-info">
                                                        <h6 style="margin-bottom:0; font-size:14px;">{{ $salesPerson->name }}</h6>
                                                        <a href="https://wa.me/{{ '+62' . substr($salesPerson->contact, 1) }}"
                                                            target="_blank" style="font-size:13px; color:#4a4a4a;">{{ $salesPerson->contact }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
@endsection
