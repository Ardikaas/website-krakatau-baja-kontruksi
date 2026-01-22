@extends('layouts.front')

@section('title', 'Product - Krakatau Baja Konstruksi')

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1 type="page" title="Project" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => 'Product']]" imagePath="images/background/page-title.jpg" />

    {{-- Project Section --}}
    @php
        $projects = [
        [
            'image' => 'images/service/service-2.jpg',
            'icon' => 'flaticon-turning',
            'category' => 'Metal',
            'title' => 'Fabrication',
            'desc' => 'Precision crafting metal structures with...',
            'detail_url' => 'service-details.html'
        ],
        [
            'image' => 'images/service/service-3.jpg',
            'icon' => 'flaticon-bending',
            'category' => 'Metal',
            'title' => 'Processing',
            'desc' => 'Transforming raw materials into high...',
            'detail_url' => 'service-details-2.html'
        ],
        [
            'image' => 'images/service/service-4.jpg',
            'icon' => 'flaticon-beam',
            'category' => 'Metal',
            'title' => 'Casting',
            'desc' => 'Transforming raw materials into high...',
            'detail_url' => 'service-details-3.html'
        ],
        [
            'image' => 'images/service/service-5.jpg',
            'icon' => 'flaticon-welding',
            'category' => 'Metal',
            'title' => 'Welding',
            'desc' => 'Our metal casting service delivers...',
            'detail_url' => 'service-details-4.html'
        ],
        [
            'image' => 'images/service/service-6.jpg',
            'icon' => 'flaticon-welding',
            'category' => 'Custom',
            'title' => 'Metal Design',
            'desc' => 'Precision crafting metal structures...',
            'detail_url' => 'service-details-5.html'
        ],
    ];
    @endphp
    <section class="service-page-three-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="main-content">
                        @foreach($projects as $index => $project)
                            <div class="service-block-two">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                            <img src="{{ asset($project['image']) }}" alt="">
                                        </figure>
                                        <div class="icon-box">
                                            <i class="{{ $project['icon'] }}"></i>
                                        </div>
                                    </div>

                                    <div class="content-box">
                                        <div class="count-box">
                                            {{ sprintf('%02d', $index + 1) }}<span>/{{ count($projects) }}</span>
                                        </div>

                                        <h6>Service</h6>
                                        <h3>{{ $project['category'] }}</h3>

                                        <div class="block-title">
                                            <div class="line-shape"></div>
                                            <h2>
                                                <a href="{{ url($project['detail_url']) }}">
                                                    [{{ $project['title'] }}]
                                                </a>
                                            </h2>
                                        </div>

                                        <p>{{ $project['desc'] }}</p>

                                        <div class="link">
                                            <a href="{{ url($project['detail_url']) }}">
                                                <i class="flaticon-right-arrow"></i>
                                            </a>
                                        </div>

                                        {{-- Overlay --}}
                                        <div class="overlay-content">
                                            <div class="count-box">
                                                {{ sprintf('%02d', $index + 1) }}<span>/{{ count($projects) }}</span>
                                            </div>

                                            <h3>{{ $project['category'] }}</h3>

                                            <div class="block-title">
                                                <div class="line-shape"></div>
                                                <h2>
                                                    <a href="{{ url($project['detail_url']) }}">
                                                        [{{ $project['title'] }}]
                                                    </a>
                                                </h2>
                                            </div>

                                            <p>{{ $project['desc'] }}</p>

                                            <div class="btn-box">
                                                <a href="{{ url($project['detail_url']) }}" class="theme-btn btn-one">
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
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="sidebar-content">
                        <div class="inner-box centred">
                            <h2>Didn't find the <span>right plan?</span> Reach out for <span>custom solution.</span></h2>
                            <div class="icon-box"><div class="icon"><i class="flaticon-headphones"></i></div></div>
                            <h4><a href="tel:66120003456">+62812 1991 1619</a></h4>
                            <p><a href="mailto:getsupport@example.com">marketing@bajakonstruksi.co.id</a></p>
                            <a href="index-2.html" class="theme-btn"><i class="flaticon-right-arrow"></i><span>Appointment</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection