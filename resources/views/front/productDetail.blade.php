@extends('layouts.front')

@section('title', $product->name . ' - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/productDetail.css'])
@endpush

@section('content')
    {{-- Banner --}}
    <x-landingPageSection1 type="page" title="Product" :breadcrumb="[
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Product', 'url' => route('product')],
        ['label' => $product->name],
    ]" imagePath="images/background/page-title.jpg" />

    {{-- PRODUCT DETAIL --}}
    <section class="project-details">
        <div class="auto-container">
            <div class="upper-box mb_75">
                <div class="row clearfix">

                    {{-- IMAGE --}}
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <figure class="image-box">
                            <img src="{{ route('admin.product.image', $images[0]) }}" alt="{{ $product->name }}">
                        </figure>
                    </div>

                    {{-- CONTENT --}}
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h2>{{ $product->name }}</h2>

                            <p>
                                {{ $product->description }}
                            </p>

                            <h3>Category</h3>
                            <ul class="list-style-one clearfix mt_25">
                                <li>
                                    <i class="flaticon-check"></i>
                                    <span>{{ $product->category }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- SPEC IMAGE --}}
    @if ($product->spec_image)
        <section class="product-table">
            <div class="auto-container">
                <div class="sec-title centred mb_45">
                    <h6>Specification</h6>
                </div>

                <div class="table-wrapper">
                    <div class="table-image">
                        <img src="{{ route('admin.product.image', $product->spec_image) }}"
                            alt="Specification {{ $product->name }}">
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
