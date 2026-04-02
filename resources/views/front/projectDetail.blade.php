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

                            {{-- CONTACT SALES --}}
                            @if ($sales && $sales->count() > 0)
                                <div class="project-sales-box mt_40">
                                    <h3>Contact Sales</h3>
                                    <div class="sales-contacts mt_25">
                                        @foreach ($sales as $sale)
                                            <div class="sales-contact mb_15">
                                                @php
                                                    $waText = "Salam sukses berniaga Bapak/Ibu " . $sale->name . ",\n\nSaya tertarik dengan project Anda *\"" . $project->translated_title . "\"* yang saya lihat di website Krakatau Baja Konstruksi.\nBoleh minta informasi lebih lanjut?\n\nLink referensi: " . url()->current();
                                                @endphp
                                                @if ($sale->photo)
                                                    <img src="{{ route('sales.image', $sale->photo) }}"
                                                        alt="{{ $sale->name }}"
                                                        style="width: 50px; height: 50px; border-radius: 50%; float: left; margin-right: 15px; object-fit: cover;">
                                                @else
                                                    <img src="https://placehold.co/100x100"
                                                        alt="Sales"
                                                        style="width: 50px; height: 50px; border-radius: 50%; float: left; margin-right: 15px; object-fit: cover;">
                                                @endif
                                                <div style="overflow: hidden;">
                                                    <p style="margin-bottom: 0;"><strong>{{ $sale->name }}</strong></p>
                                                    <p style="margin-bottom: 0; font-size: 14px;">Contact: <a href="https://wa.me/{{ '62' . substr($sale->contact, 1) }}?text={{ urlencode($waText) }}"
                                                            target="_blank" style="color: var(--theme-color);">{{ $sale->contact }}</a></p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
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
                const carousel = document.getElementById('projectCarousel');
                const dots = document.querySelectorAll('.carousel-dot');
                let autoSlide;
                
                let isDragging = false;
                let startPos = 0;
                let currentTranslate = 0;
                let prevTranslate = 0;
                let animationID = 0;

                function update() {
                    currentTranslate = current * -100;
                    prevTranslate = currentTranslate;
                    track.style.transform = `translateX(${currentTranslate}%)`;
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

                // Touch and Mouse Drag Events
                carousel.addEventListener('mousedown', touchStart);
                carousel.addEventListener('touchstart', touchStart, {passive: true});
                carousel.addEventListener('mouseup', touchEnd);
                carousel.addEventListener('mouseleave', touchEnd);
                carousel.addEventListener('touchend', touchEnd);
                carousel.addEventListener('mousemove', touchMove);
                carousel.addEventListener('touchmove', touchMove, {passive: true});

                function getPositionX(event) {
                    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
                }

                function touchStart(event) {
                    isDragging = true;
                    startPos = getPositionX(event);
                    animationID = requestAnimationFrame(animation);
                    track.style.transition = 'none';
                    clearInterval(autoSlide);
                }

                function touchMove(event) {
                    if (isDragging) {
                        const currentPosition = getPositionX(event);
                        const diff = currentPosition - startPos;
                        // convert pixel diff to percentage
                        const diffPercent = (diff / carousel.clientWidth) * 100;
                        currentTranslate = prevTranslate + diffPercent;
                    }
                }

                function touchEnd() {
                    isDragging = false;
                    cancelAnimationFrame(animationID);
                    
                    const movedBy = currentTranslate - prevTranslate;
                    
                    // If moved enough, change slide
                    if (movedBy < -10 && current < total - 1) current += 1;
                    else if (movedBy > 10 && current > 0) current -= 1;
                    // Wrap around
                    else if (movedBy < -10 && current === total -1) current = 0;
                    else if (movedBy > 10 && current === 0) current = total - 1;

                    track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1)';
                    update();
                    resetAuto();
                }

                function animation() {
                    track.style.transform = `translateX(${currentTranslate}%)`;
                    if (isDragging) requestAnimationFrame(animation);
                }

            })();
        </script>
    @endif
@endsection
