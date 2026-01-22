@extends('layouts.front')

@section('title', 'Project - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/productDetail.css'])
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
                        <figure class="image-box"><img src="{{ asset('images/project/project-28.jpg') }}" alt="">
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h2>Hornsdale Power Reserve</h2>
                            <p>Titanium Arch Crossing is an innovative and groundbreaking architectural project designed to
                                integrate cutting-edge technology with timeless structural beauty. Located in a vibrant
                                metropolitan area, this striking archway will serve as both a functional transportation
                                route and a monumental symbol of modern engineering. The project combines high-strength
                                titanium alloys with advanced architectural techniques to create a visually stunning piece
                                of infrastructure.</p>
                            <h3>Scope of Work</h3>
                            <p>Which of us ever undertakes laborious physical exercise, except to obtain
                                some advantage from it but who has any right but we must explain to you
                                how all this mistaken idea of denouncing pleasure and praising pain was
                                born and I will give you a complete account of the system.</p>
                            <ul class="list-style-one clearfix mt_25">
                                <li><i class="flaticon-check"></i><span>Site Preparation and Foundation Work</span></li>
                                <li><i class="flaticon-check"></i><span>Titanium Arch Construction</span></li>
                                <li><i class="flaticon-check"></i><span>Design and Aesthetic Detailing</span></li>
                                <li><i class="flaticon-check"></i><span>Safety and Testing</span></li>
                            </ul>
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
                                <h5>Naxly Info Tech</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-filter-1"></i></div>
                            <div class="inner">
                                <span>Catgory</span>
                                <h5>Infrastructure</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-calendar-2"></i></div>
                            <div class="inner">
                                <span>Date</span>
                                <h5>14 January, 2024</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-home"></i></div>
                            <div class="inner">
                                <span>Location</span>
                                <h5>Los Angeles, USA</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-box pb_40">
                <div class="text-box centred">
                    <h3>Challenges & Solutions</h3>
                    <p>The project faced material, weather, and urban integration challenges, resolved through advanced
                        fabrication,
                        resilient design, and seamless collaboration with city planners.</p>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                        <div class="single-item">
                            <h3><i class="flaticon-screw"></i><span>Material Strength</span></h3>
                            <p>Working with titanium presented challenges in terms of manufacturing and welding. Advanced
                                precision tools and techniques have been implemented.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                        <div class="single-item">
                            <h3><i class="flaticon-screw"></i><span>Urban Integration</span></h3>
                            <p>Seamlessly integrating the arch into the existing city infrastructure while maintaining its
                                grandeur required careful planning and collaboration with urban planners.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-project">
                <h2>Related Projects</h2>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 project-block">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer" style="background-image: url(assets/images/project/project-3.jpg);">
                                </div>
                                <div class="upper-box">
                                    <h3><a href="project-details.html">Titanium Arch
                                            Crossing</a></h3>
                                </div>
                                <div class="lower-box">
                                    <h6><i class="flaticon-nut"></i><span>Infrastructure</span></h6>
                                    <div class="link"><a href="project-details.html"><i
                                                class="flaticon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-block">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer" style="background-image: url(assets/images/project/project-4.jpg);">
                                </div>
                                <div class="upper-box">
                                    <h3><a href="project-details.html">Hornsdale Power
                                            Reserve</a></h3>
                                </div>
                                <div class="lower-box">
                                    <h6><i class="flaticon-nut"></i><span>Energy</span></h6>
                                    <div class="link"><a href="project-details.html"><i
                                                class="flaticon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-block">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer" style="background-image: url(assets/images/project/project-5.jpg);">
                                </div>
                                <div class="upper-box">
                                    <h3><a href="project-details.html">Ironspire Skyscraper
                                            Framework</a></h3>
                                </div>
                                <div class="lower-box">
                                    <h6><i class="flaticon-nut"></i><span>Manufacturing</span></h6>
                                    <div class="link"><a href="project-details.html"><i
                                                class="flaticon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
