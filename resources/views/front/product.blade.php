@extends('layouts.front')

@section('title', 'Product - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/product.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1 type="page" title="Product" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => 'Product']]" imagePath="images/background/page-title.jpg" />

    {{-- News Section --}}
    <section class="project-style-three">
        <div class="auto-container">
            <div class="sortable-masonry">
                <div class="filters centred">
                    <ul class="filter-tabs filter-btns mb_55">
                        <li class="active filter" data-role="button" data-filter=".all"><i class="flaticon-nut"></i><span>All
                                [15]</span></li>
                        <li class="filter" data-role="button" data-filter=".cat-1"><span>Infrastructure</span></li>
                        <li class="filter" data-role="button" data-filter=".cat-2"><span>Industrial</span></li>
                        <li class="filter" data-role="button" data-filter=".cat-3"><span>Energy</span></li>
                        <li class="filter" data-role="button" data-filter=".cat-4">Transportation</li>
                        <li class="filter" data-role="button" data-filter=".cat-5">Custom</li>
                    </ul>
                </div>
                <div class="items-container row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all cat-3 cat-1 cat-2">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer"
                                    style="background-image: url({{ asset('images/project/project-3.jpg') }});">
                                </div>
                                <div class="upper-box">
                                    <h3><a href="/product/1">Titanium Arch
                                            Crossing</a></h3>
                                </div>
                                <div class="lower-box">
                                    <h6><i class="flaticon-nut"></i><span>Infrastructure</span></h6>
                                    <div class="link"><a href="/product/1"><i class="flaticon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all cat-1 cat-3 cat-4">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer"
                                    style="background-image: url({{ asset('images/project/project-4.jpg') }});">
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
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all cat-3 cat-2 cat-5">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer"
                                    style="background-image: url({{ asset('images/project/project-5.jpg') }});">
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
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all cat-1 cat-2 cat-4">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer"
                                    style="background-image: url({{ asset('images/project/project-6.jpg') }});">
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
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all cat-3 cat-2 cat-5">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer"
                                    style="background-image: url({{ asset('images/project/project-7.jpg') }});">
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
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all cat-1 cat-4 cat-5">
                        <div class="project-block-two">
                            <div class="inner-box">
                                <div class="bg-layer"
                                    style="background-image: url({{ asset('images/project/project-8.jpg') }});">
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
                </div>
            </div>
            <div class="pagination-wrapper centred pt_20">
                <ul class="pagination">
                    <li><a href="project.html"><i class="flaticon-right"></i><span>Prev</span></a></li>
                    <li><a href="project.html" class="current">01</a></li>
                    <li>
                        <div class="bar"></div>
                    </li>
                    <li><a href="project.html">02</a></li>
                    <li>
                        <div class="bar"></div>
                    </li>
                    <li><a href="project.html">03</a></li>
                    <li><a href="project.html"><span>Next</span><i class="flaticon-right"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
