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

                            @if ($sales->count() > 0)
                                <h3>Sales Contact</h3>
                                <div class="sales-contacts mt_25">
                                    @foreach ($sales as $sale)
                                        <div class="sales-contact mb_15">
                                            <p><strong>{{ $sale->name }}</strong></p>
                                            <p>Contact: <a href="https://wa.me/{{ '+62' . substr($sale->contact, 1) }}"
                                                    target="_blank">{{ $sale->contact }}</a></p>
                                            @if ($sale->photo)
                                                <img src="{{ route('sales.image', $sale->photo) }}"
                                                    alt="{{ $sale->name }}"
                                                    style="width: 50px; height: 50px; border-radius: 50%;">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
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
