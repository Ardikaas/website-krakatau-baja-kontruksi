<section class="banner-top-section p_relative">
    @if(!empty($imagePath))
        <div
            class="bg-layer"
            style="background-image: url('{{ asset($imagePath) }}');"
        ></div>
    @endif
    <div class="outer-container">
        <div class="based-content">
            <div class="inner">
                <div class="landing-box-image-container">
                    <img src="{{ asset('images/landing-box-image.jpeg') }}" alt="Krakatau Steel Construction Industries" class="landing-box-image">
                </div>
            </div>

            <span class="rotate-text">{{ __('messages.established_since_1992') }}</span>
        </div>

        <div class="inner-box">
            <div class="content-box">
                
                {{-- HERO (HOME) --}}
                @if($type === 'hero')
                {{-- <div class="video-box">
                    <div class="bg-color"></div>
                    <div class="video-bg"></div>
                    <a href="https://www.youtube.com/watch?v=zL2bo91eiWw" class="lightbox-image" data-caption="" target="_blank"><i class="flaticon-play-button"></i></a>
                </div> --}}
                    @php
                        [$first, $second, $third] = explode('|', $title);
                    @endphp
                    <h2>
                        {{ $first }} <br> <span>{{ $second }}</span>{{ $third }}
                    </h2>
                @endif

                {{-- PAGE TITLE (NEWS, ABOUT, CONTACT, DLL) --}}
                @if($type === 'page')
                    <h2>{{ $title }}</h2>
                    @if(!empty($breadcrumb))
                    <ul class="bread-crumb">
                        @foreach($breadcrumb as $item)
                            <li>
                                @if(isset($item['url']))
                                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                                @else
                                    <span>{{ $item['label'] }}</span>
                                @endif
                            </li>

                            @if(!$loop->last)
                                <li><i class="flaticon-right"></i></li>
                            @endif
                        @endforeach
                    </ul>
                    @endif
                @endif

            </div>
        </div>
    </div>
</section>
