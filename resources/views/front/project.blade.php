@extends('layouts.front')

@section('title', 'Project - Krakatau Baja Konstruksi')

@section('content')
    {{-- Banner --}}
    <x-landingPageSection1 type="page" title="Project" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => 'Project']]" imagePath="images/background/page-title.jpg" />

    <section class="service-page-three-section">
        <div class="auto-container">
            <div class="row clearfix">
                {{-- Main content --}}
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="main-content">
                        @foreach ($projects as $index => $project)
                            <div class="service-block-two">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/default_project.png') }}"
                                                alt="{{ $project->title }}">
                                        </figure>
                                    </div>

                                    <div class="content-box">
                                        <div class="count-box">
                                            {{ sprintf('%02d', $index + 1) }}<span>/{{ $projects->count() }}</span>
                                        </div>

                                        <h6>Service</h6>
                                        <h3>{{ $project->category }}</h3>

                                        <div class="block-title">
                                            <div class="line-shape"></div>
                                            <h2>
                                                <a href="{{ route('front.projects.show', $project) }}">
                                                    [{{ $project->title }}]
                                                </a>
                                            </h2>
                                        </div>

                                        <p class="project-description">{{ $project->description }}</p>

                                        <div class="link">
                                            <a href="{{ route('front.projects.show', $project) }}">
                                                <i class="flaticon-right-arrow"></i>
                                            </a>
                                        </div>

                                        {{-- Overlay --}}
                                        <div class="overlay-content">
                                            <div class="count-box">
                                                {{ sprintf('%02d', $index + 1) }}<span>/{{ $projects->count() }}</span>
                                            </div>

                                            <h3>{{ $project->category }}</h3>

                                            <div class="block-title">
                                                <div class="line-shape"></div>
                                                <h2>
                                                    <a href="{{ route('front.projects.show', $project) }}">
                                                        [{{ $project->title }}]
                                                    </a>
                                                </h2>
                                            </div>

                                            <p class="project-description">{{ $project->description }}</p>

                                            <div class="btn-box">
                                                <a href="{{ route('front.projects.show', $project) }}"
                                                    class="theme-btn btn-one">
                                                    <i class="flaticon-right-arrow"></i>
                                                    <span>Read More</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="sidebar-content">
                        <div class="inner-box centred">
                            <h2>Didn't find the <span>right plan?</span> Reach out for <span>custom solution.</span></h2>
                            <div class="icon-box">
                                <div class="icon"><i class="flaticon-headphones"></i></div>
                            </div>
                            <h4><a href="tel:66120003456">+62812 1991 1619</a></h4>
                            <p><a href="mailto:marketing@bajakonstruksi.co.id">marketing@bajakonstruksi.co.id</a></p>
                            <a href="{{ url('/contact') }}" class="theme-btn"><i
                                    class="flaticon-right-arrow"></i><span>Appointment</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
