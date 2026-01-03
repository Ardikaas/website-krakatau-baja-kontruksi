<section class="banner-top-section p_relative">
    <div class="outer-container">
        <div class="based-content">
            <div class="inner">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" />
                        </a>
                    </figure>
                    <h5>Berbasis di <br />Indonesia.</h5>
                </div>

                <div class="single-item">
                    <div
                        class="shape"
                    ></div>
                    <h2>28<span>+</span></h2>
                    <h5>Negara <br />Dilayani.</h5>
                </div>
            </div>

            <span class="rotate-text">Berdiri Sejak, 1992</span>
        </div>

        <div class="inner-box">
            <div class="content-box">
                
                {{-- HERO (HOME) --}}
                @if($type === 'hero')
                <div class="video-box">
                    <div class="bg-color"></div>
                    <div class="video-bg"></div>
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption="" target="_blank"><i class="flaticon-play-button"></i></a>
                </div>
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
