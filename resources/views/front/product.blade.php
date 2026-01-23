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

                {{-- FILTER (STATIC, TEMPLATE SAJA) --}}
                <div class="filters centred">
                    <ul class="filter-tabs filter-btns mb_55">
                        <li class="active filter" data-filter=".all">
                            <i class="flaticon-nut"></i>
                            <span>All</span>
                        </li>

                        @foreach ($categories as $category)
                            @php
                                $catClass = 'cat-' . \Illuminate\Support\Str::slug($category);
                            @endphp

                            <li class="filter" data-filter=".{{ $catClass }}">
                                <span>{{ $category }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="items-container row clearfix">

                    @foreach ($products as $product)
                        @php
                            $thumbnail = $product->thumbnail[0] ?? null;
                            $catClass = 'cat-' . \Illuminate\Support\Str::slug($product->category);
                        @endphp

                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all {{ $catClass }}">

                            <div class="project-block-two">
                                <div class="inner-box">

                                    {{-- IMAGE --}}
                                    <div class="bg-layer"
                                        style="background-image: url(
                                            {{ $thumbnail ? route('admin.product.image', $thumbnail) : 'https://placehold.co/600x400' }}
                                        );">
                                    </div>

                                    {{-- TITLE --}}
                                    <div class="upper-box">
                                        <h3>
                                            <a href="{{ route('product.detail', $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                    </div>

                                    {{-- CATEGORY --}}
                                    <div class="lower-box">
                                        <h6>
                                            <i class="flaticon-nut"></i>
                                            <span>{{ $product->category }}</span>
                                        </h6>

                                        <div class="link">
                                            <a href="{{ route('product.detail', $product->slug) }}">
                                                <i class="flaticon-right-arrow"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

            {{-- PAGINATION --}}
            <div class="pagination-wrapper centred pt_20">
                {{ $products->links() }}
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filters = document.querySelectorAll('.filter');
            const items = document.querySelectorAll('.masonry-item');

            filters.forEach(btn => {
                btn.addEventListener('click', () => {

                    // active state
                    filters.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const filter = btn.getAttribute('data-filter');

                    items.forEach(item => {
                        if (filter === '.all' || item.classList.contains(filter.substring(
                                1))) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
