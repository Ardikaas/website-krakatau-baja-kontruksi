@extends('layouts.front')

@section('title', 'Product - Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/product.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1 type="page" title="{{ __('messages.page_product') }}" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => __('messages.page_product')]]" imagePath="images/background/page-title.jpg" />

    {{-- News Section --}}
    <section class="project-style-three">
        <div class="auto-container">
            <div class="sortable-masonry">

                {{-- FILTER (STATIC, TEMPLATE SAJA) --}}
                <div class="filters centred">
                    <ul class="filter-tabs filter-btns mb_55">
                        <li class="active filter" data-filter=".all">
                            <i class="flaticon-nut"></i>
                            <span>{{ __('messages.all') }}</span>
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

                    @foreach ($products as $index => $product)
                        @php
                            $thumbnail = $product->thumbnail[0] ?? null;
                            $catClass = 'cat-' . \Illuminate\Support\Str::slug($product->category);

                            $sales = \App\Models\Sales::where('categories', 'like', '%' . $product->category . '%')
                                ->take(2)
                                ->get();
                        @endphp

                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all {{ $catClass }}">

                            <a href="{{ route('product.detail', $product->slug) }}" class="product-card-link">
                                <div class="simple-product-card">

                                    {{-- IMAGE --}}
                                    <div class="card-image"
                                        style="background-image:url(
                        {{ $thumbnail ? route('product.image', $thumbnail) : 'https://placehold.co/600x400' }}
                    );">
                                    </div>

                                    {{-- BODY --}}
                                    <div class="card-body">

                                        <h3 class="product-title">
                                            {{ $product->translated_name }}
                                        </h3>

                                        {{-- CATEGORY --}}
                                        <span class="product-category">
                                            {{ $product->category }}
                                        </span>

                                        {{-- CONTACT SALES --}}
                                        @if ($sales->count() > 0)
                                            @foreach ($sales as $salesPerson)
                                                <div class="sales-contact">
                                                    <img src="{{ $salesPerson->photo ? route('sales.image', $salesPerson->photo) : 'https://placehold.co/100x100' }}"
                                                        alt="Sales">
                                                    <div class="sales-info">
                                                        <h6>{{ $salesPerson->name }}</h6>
                                                        <a href="https://wa.me/{{ '+62' . substr($salesPerson->contact, 1) }}"
                                                            target="_blank">{{ $salesPerson->contact }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="sales-contact">
                                                <img src="https://placehold.co/100x100" alt="Sales">
                                                <div class="sales-info">
                                                    <h6>{{ __('messages.no_sales_contact') }}</h6>
                                                    <a href="#" target="_blank">{{ __('messages.not_available') }}</a>
                                                    <small>{{ __('messages.not_available') }}</small>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </a>

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
