{{-- About Section --}}
<section class="about-section pt_120">
    <div class="auto-container">
        <div class="row clearfix">
            {{-- Left Column - Content --}}
            <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <div class="sec-title mb_45">
                        <h6>{{ __('messages.about_us') }}</h6>
                        <h2>{!! __('messages.about_leaders_title') !!}</h2>
                    </div>
                    <div class="inner-box">
                        <div class="single-team">
                            <h3>{{ __('messages.team_of_innovators') }}</h3>
                            <div class="link"><a href="/about-us/#directors"><i class="flaticon-right-arrow"></i></a></div>
                            <span class="rotate-text">{{ __('messages.core_team') }}</span>
                            <figure class="image-box"><img src="{{ asset('images/resource/team-1.png') }}" alt="Team">
                            </figure>
                        </div>
                        <div class="text-box">
                            <h3>{{ __('messages.building_quality_title') }}</h3>
                            <p>{{ __('messages.building_quality_desc') }}</p>
                            <a href="/about-us/#company-info"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column - Image --}}
            <div class="col-lg-5 col-md-12 col-sm-12 inner-column">
                <div class="inner-content">
                    {{-- <div class="award-box">
                        <ul class="icon-list">
                            <li><i class="flaticon-iso"></i></li>
                            <li><i class="flaticon-trophy"></i></li>
                        </ul>
                        <h5>Certified &<br>Award-Winner.</h5>
                    </div> --}}
                    <div class="image-box">
                        <figure class="image clearfix"><img src="{{ asset('images/yt-thumbnail.jpg') }}"
                                alt="About"></figure>
                        <div class="image-content">
                            <div class="text-box">
                                <h2>10<span>k</span></h2>
                                <h5>{!! __('messages.tons_produced') !!}</h5>
                            </div>
                            <div class="video-box">
                                <h5>{!! __('messages.our_video') !!}</h5>
                                <a href="https://www.youtube.com/watch?v=zL2bo91eiWw" target='_blank' class="lightbox-image"><i
                                        class="flaticon-play-button"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- About Section End --}}