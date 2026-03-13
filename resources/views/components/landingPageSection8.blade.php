<section class="chooseus-section">
    <div class="auto-container">
        <div class="sec-title centred mb_45">
            <h6>{{ __('messages.why_choose_us') }}</h6>
            <h2>{!! __('messages.top_reasons_to_choose') !!}</h2>
            <p class="mt_12">{{ __('messages.delivering_quality') }}</p>
        </div>

        <div class="row clearfix">

            @if ($whyChooseUs->count())
                @foreach ($whyChooseUs as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="light-icon">
                                    <i class="flaticon-gear"></i>
                                </div>


                                <div class="icon-box">
                                    <div class="icon">
                                        <img src="{{ route('admin.why-choose-us.view', basename($item->image)) }}"
                                            alt="{{ $item->title }}">
                                    </div>
                                    <div class="bar-shape"></div>
                                </div>

                                <h3>
                                    <a href="javascript:void(0)">
                                        {{ $item->translated_title }}
                                    </a>
                                </h3>

                                <p>{{ $item->translated_description }}</p>

                                <div class="link">
                                    <a href="javascript:void(0)">
                                        <i class="flaticon-right-arrow"></i>
                                        <span>{{ __('messages.read_more') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/manufacturing.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">{{ __('messages.industry_expertise') }}</a></h3>
                            <p>{{ __('messages.industry_expertise_desc') }}</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/engineer.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">{{ __('messages.skilled_workforce') }}</a></h3>
                            <p>{{ __('messages.skilled_workforce_desc') }}</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/productivity.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">{{ __('messages.timely_delivery') }}</a></h3>
                            <p>{{ __('messages.timely_delivery_desc') }}</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/target.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">{{ __('messages.competitive_pricing') }}</a></h3>
                            <p>{{ __('messages.competitive_pricing_desc') }}</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/test.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">{{ __('messages.quality_assurance') }}</a></h3>
                            <p>{{ __('messages.quality_assurance_desc') }}</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/certificate.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">{{ __('messages.industry_recognition') }}</a></h3>
                            <p>{{ __('messages.industry_recognition_desc') }}</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>{{ __('messages.read_more') }}</span></a></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
