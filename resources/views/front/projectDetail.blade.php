@extends('layouts.front')

@section('title', 'Project - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/projectDetail.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1 type="page" title="Project" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => 'Project']]" imagePath="images/background/page-title.jpg" />

    <!-- product-details -->
    <section class="project-details">
        <div class="auto-container">
            <div class="upper-box mb_75">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <figure class="image-box"><img src="{{ $project->image ? route('admin.projects.view', ['filename' => basename($project->image)]) : asset('images/default_project.png') }}" alt="">
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h2>{{ $project->title }}</h2>
                            <p>{{ $project->description }}</p>
                            <h3>Scope of Work</h3>
                            <p>{{ $project->scope_of_work }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-box mb_75">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-user-1"></i></div>
                            <div class="inner">
                                <span>Client</span>
                                <h5>{{ $project->client }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-filter-1"></i></div>
                            <div class="inner">
                                <span>Category</span>
                                <h5>{{ $project->category }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-calendar-2"></i></div>
                            <div class="inner">
                                <span>Date</span>
                                <h5>{{ $project->date }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-home"></i></div>
                            <div class="inner">
                                <span>Location</span>
                                <h5>{{ $project->location }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-box pb_40">
                <div class="text-box centred">
                    <h3>Challenges & Solutions</h3>
                    <p>{{ $project->challenges   }}</p>
                </div>
                @if($project->solutions && is_array($project->solutions))
                    <div class="row clearfix">
                        @foreach($project->solutions as $solution)
                            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                                <div class="single-item">
                                    <h3><i class="flaticon-screw"></i><span>{{ $solution['title'] ?? '' }}</span></h3>
                                    <p>{{ $solution['description'] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
