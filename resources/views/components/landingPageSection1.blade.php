<section class="banner-top-section p_relative">
    <div class="outer-container">
        <div class="based-content">
            <div class="inner">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{ url('/') }}">
                            <img src="assets/images/logo.png" alt="" />
                        </a>
                    </figure>
                    <h5>Based On <br />United States.</h5>
                </div>

                <div class="single-item">
                    <div
                        class="shape"
                        style="background-image: url(assets/images/shape/shape-1.png);"
                    ></div>
                    <h2>28<span>+</span></h2>
                    <h5>Countries <br />Served Proudly.</h5>
                </div>
            </div>

            <span class="rotate-text">Established Since, 1985</span>
        </div>

        <div class="inner-box">
            <div class="content-box">
                <div class="video-box">
                    <div class="bg-color"></div>
                    <div class="video-bg" style="background-image: url(assets/images/resource/video-1.jpg);"></div>
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption=""><i class="flaticon-play-button"></i></a>
                </div>
                @php
                    [$first, $second, $third] = explode('|', $title);
                @endphp
                {{-- HERO (HOME) --}}
                @if($type === 'hero')
                <h2>
                    {{ $first }} <br> 
                    <span>{{ $second }}</span>{{ $third }}
                </h2>
                @endif

                {{-- PAGE TITLE (ABOUT, CONTACT, DLL) --}}
                @if($type === 'page')
                    <h1>{{ $title }}</h1>
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

            </div>
        </div>
    </div>
</section>
