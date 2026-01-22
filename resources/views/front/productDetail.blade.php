@extends('layouts.front')

@section('title', 'Product - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/productDetail.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1 type="page" title="Product" :breadcrumb="[
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Product', 'url' => route('product')],
        ['label' => '{{ id }}'],
    ]" imagePath="images/background/page-title.jpg" />

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
        </div>
    </section>

    <section class="organization-structure">
        <div class="auto-container">

            <div class="sec-title centred mb_45">
                <h6>Spesification</h6>
            </div>

            <div class="structure-wrapper">
                <div class="structure-image">
                    <img src="{{ asset('images/background/company-bg.jpg') }}" alt="Organization Structure" />
                </div>
            </div>

        </div>
    </section>
@endsection
