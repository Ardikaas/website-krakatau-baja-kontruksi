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
                // First try to use the banner-specific text if it exists
                $bannerTitle = $banner->title;
                $bannerDesc = $banner->description;
                
                // If either is missing, grab the default from language files based on slide index
                $text = $heroTexts[$loop->index] ?? $heroTexts[0];
                
                $finalTitle = $bannerTitle ?: $text['title'];
                // Only replace the | with <br> if the title came from the banner database since the lang file might have its own HTML
                if ($bannerTitle) {
                    $finalTitle = str_replace('|', '<br>', $finalTitle);
                }
                
                $finalDesc = $bannerDesc ?: $text['description'];
            @endphp

            <div class="slide-item p_relative">
                <div class="pattern-layer-2"></div>

                {{-- IMAGE DINAMIS --}}
                <div class="bg-layer"
                    style="background-image: url('{{ route('admin.hero-banners.view', basename($banner->image)) }}');">
                </div>

                {{-- TEKS DINAMIS ATAU STATIS SESUAI URUTAN --}}
                <div class="outer-container clearfix">
                    <div class="content-box">
                        <div class="inner-box">
                            <h2>{!! $finalTitle !!}</h2>
                            <p>{{ $finalDesc }}</p>
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
