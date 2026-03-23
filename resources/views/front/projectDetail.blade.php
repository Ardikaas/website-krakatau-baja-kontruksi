@extends('layouts.front')

@section('title', $project->translated_title . ' - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/projectDetail.css'])
@endpush

@section('content')
    {{-- Banner --}}
    <x-landingPageSection1 type="page" title="{{ __('messages.page_project') }}" :breadcrumb="[
        ['label' => 'Home', 'url' => url('/')],
        ['label' => __('messages.page_project'), 'url' => route('front.projects.index')],
        ['label' => $project->translated_title],
    ]" imagePath="images/background/page-title.jpg" />

    {{-- Project Detail --}}
    <section class="project-details">
        <div class="auto-container">
            <div class="upper-box mb_75">
                <div class="row clearfix">

                    {{-- IMAGE / CAROUSEL --}}
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        @php
                            $images = $project->images ?? [];
                            $imageCount = count($images);
                        @endphp

                        @if ($imageCount > 1)
                            {{-- CAROUSEL --}}
                            <div class="project-carousel" id="projectCarousel">
                                <div class="carousel-track" id="carouselTrack">
                                    @foreach ($images as $img)
                                        <div class="carousel-slide">
                                            <img src="{{ route('admin.projects.view', ['filename' => basename($img)]) }}"
                                                alt="{{ $project->translated_title }}">
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Navigation Arrows --}}
                                <button class="carousel-btn carousel-prev" onclick="prevSlide()">&lsaquo;</button>
                                <button class="carousel-btn carousel-next" onclick="nextSlide()">&rsaquo;</button>

                                {{-- Dots --}}
                                <div class="carousel-dots" id="carouselDots">
                                    @foreach ($images as $i => $img)
                                        <span class="carousel-dot {{ $i === 0 ? 'active' : '' }}"
                                            onclick="goToSlide({{ $i }})"></span>
                                    @endforeach
                                </div>
                            </div>
                        @elseif ($imageCount === 1)
                            {{-- SINGLE IMAGE --}}
                            <figure class="image-box">
                                <img src="{{ route('admin.projects.view', ['filename' => basename($images[0])]) }}"
                                    alt="{{ $project->translated_title }}">
                            </figure>
                        @else
                            {{-- NO IMAGE --}}
                            <figure class="image-box">
                                <img src="{{ asset('images/default_project.png') }}" alt="No Image">
                            </figure>
                        @endif
                    </div>

                    {{-- CONTENT --}}
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h2>{{ $project->translated_title }}</h2>

                            <div class="project-info-list">
                                <div class="project-info-item">
                                    <div class="info-icon"><i class="flaticon-nut"></i></div>
                                    <div class="info-inner">
                                        <span class="info-label">{{ __('messages.project_what') }}</span>
                                        <h5>{{ $project->translated_what }}</h5>
                                    </div>
                                </div>

                                <div class="project-info-item">
                                    <div class="info-icon"><i class="flaticon-home"></i></div>
                                    <div class="info-inner">
                                        <span class="info-label">{{ __('messages.project_location') }}</span>
                                        <h5>{{ $project->translated_location }}</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="project-description-box">
                                <h3>{{ __('messages.project_description') }}</h3>
                                <p>{{ $project->translated_description }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @if ($imageCount > 1)
        <script>
            (function() {
                let current = 0;
                const total = {{ $imageCount }};
                const track = document.getElementById('carouselTrack');
                const dots = document.querySelectorAll('.carousel-dot');
                let autoSlide;

                function update() {
                    track.style.transform = `translateX(-${current * 100}%)`;
                    dots.forEach((d, i) => d.classList.toggle('active', i === current));
                }

                window.nextSlide = function() {
                    current = (current + 1) % total;
                    update();
                    resetAuto();
                };

                window.prevSlide = function() {
                    current = (current - 1 + total) % total;
                    update();
                    resetAuto();
                };

                window.goToSlide = function(i) {
                    current = i;
                    update();
                    resetAuto();
                };

                function resetAuto() {
                    clearInterval(autoSlide);
                    autoSlide = setInterval(() => {
                        current = (current + 1) % total;
                        update();
                    }, 4000);
                }

                resetAuto();
            })();
        </script>
    @endif
@endsection
