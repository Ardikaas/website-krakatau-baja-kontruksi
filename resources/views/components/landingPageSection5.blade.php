{{-- Service Section --}}
<section class="service-section">
    <div class="bg-layer" style="background-image: url({{ asset('images/background/service-bg.jpg') }});"></div>
    <div class="auto-container">
        <div class="inner-container">
            {{-- Upper Box --}}
            <div class="upper-box">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 title-column">
                        <div class="sec-title">
                            <h6>{{ __('messages.specification') }}</h6>
                            <h2>{!! __('messages.service_excellence_title') !!}</h2>
                            <p class="mt_12">{{ __('messages.service_excellence_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lower Box --}}
            <div class="lower-box">
                {{-- Single Service Box --}}
                <div class="single-service-box">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('images/resource/service-1.png') }}" alt="Service">
                        </figure>
                        <div class="lower-content">
                            <h3>{{ __('messages.discover_services') }}</h3>
                            <p>{{ __('messages.services_tailored') }}</p>
                            <a href="#"><i class="flaticon-right-arrow"></i><span>{{ __('messages.all_services') }}</span></a>
                        </div>
                    </div>
                </div>

                {{-- Three Item Carousel --}}
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                    {{-- Service Block 1 --}}
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-inner">
                                <span class="count-text">01</span>
                                <div class="image-box">
                                    <div class="shape"
                                        style="background-image: url({{ asset('images/shape/shape-6.png') }});"></div>
                                    <figure class="image"><img src="{{ asset('images/service/service-1.jpg') }}"
                                            alt="Service"></figure>
                                    <div class="icon-box"><i class="flaticon-turning"></i></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="block-title">
                                    <div class="line-shape"></div>
                                    <h3><a href="#">{{ __('messages.service_fabrication') }}</a></h3>
                                </div>
                                <p>{{ __('messages.service_fabrication_desc') }}</p>
                                <div class="btn-box"><a href="#"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                            </div>
                        </div>
                    </div>

                    {{-- Service Block 2 --}}
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-inner">
                                <span class="count-text">02</span>
                                <div class="image-box">
                                    <div class="shape"
                                        style="background-image: url({{ asset('images/shape/shape-6.png') }});"></div>
                                    <figure class="image"><img src="{{ asset('images/service/service-1.jpg') }}"
                                            alt="Service"></figure>
                                    <div class="icon-box"><i class="flaticon-bending"></i></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="block-title">
                                    <div class="line-shape"></div>
                                    <h3><a href="#">{{ __('messages.service_metal_processing') }}</a></h3>
                                </div>
                                <p>{{ __('messages.service_metal_processing_desc') }}</p>
                                <div class="btn-box"><a href="#"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                            </div>
                        </div>
                    </div>

                    {{-- Service Block 3 --}}
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-inner">
                                <span class="count-text">03</span>
                                <div class="image-box">
                                    <div class="shape"
                                        style="background-image: url({{ asset('images/shape/shape-6.png') }});"></div>
                                    <figure class="image"><img src="{{ asset('images/service/service-1.jpg') }}"
                                            alt="Service"></figure>
                                    <div class="icon-box"><i class="flaticon-beam"></i></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="block-title">
                                    <div class="line-shape"></div>
                                    <h3><a href="#">{{ __('messages.service_metal_casting') }}</a></h3>
                                </div>
                                <p>{{ __('messages.service_metal_casting_desc') }}</p>
                                <div class="btn-box"><a href="#"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Service Section End --}}