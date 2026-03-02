@php
    $heroTexts = [
        [
            'title' => __('messages.hero_text_1_title'),
            'description' => __('messages.hero_text_1_desc'),
        ],
        [
            'title' => __('messages.hero_text_2_title'),
            'description' => __('messages.hero_text_2_desc'),
        ],
        [
            'title' => __('messages.hero_text_3_title'),
            'description' => __('messages.hero_text_3_desc'),
        ],
    ];
@endphp

<section class="banner-carousel owl-theme owl-carousel owl-dots-none">
    @if ($heroBanners->count())
        @foreach ($heroBanners as $banner)
            @php
                $text = $heroTexts[$loop->index] ?? $heroTexts[0];
            @endphp

            <div class="slide-item p_relative">
                <div class="pattern-layer-2"></div>

                {{-- IMAGE DINAMIS --}}
                <div class="bg-layer"
                    style="background-image: url('{{ route('admin.hero-banners.view', basename($banner->image)) }}');">
                </div>

                {{-- TEKS STATIS SESUAI URUTAN --}}
                <div class="outer-container clearfix">
                    <div class="content-box">
                        <div class="inner-box">
                            <h2>{!! $text['title'] !!}</h2>
                            <p>{{ $text['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        {{-- FALLBACK TOTAL (PAKAI STATIS SEPENUHNYA) --}}
        @foreach ($heroTexts as $text)
            <div class="slide-item p_relative">
                <div class="pattern-layer-2"></div>
                <div class="bg-layer" style="background-image: url('{{ asset('images/banner/hero-banner-1.jpeg') }}');">
                </div>

                <div class="outer-container clearfix">
                    <div class="content-box">
                        <div class="inner-box">
                            <h2>{!! $text['title'] !!}</h2>
                            <p>{{ $text['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

</section>
