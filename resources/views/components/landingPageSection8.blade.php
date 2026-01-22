<section class="chooseus-section">
    <div class="auto-container">
        <div class="sec-title centred mb_45">
            <h6>Why Choose Us</h6>
            <h2>Top Reasons to <span>[Choose]</span> Us</h2>
            <p class="mt_12">Delivering quality, innovation, and precision.</p>
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

                                <div class="block-shape"
                                    style="background-image: url({{ asset('images/shape/shape-11.png') }});">
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
                                        {{ $item->title }}
                                    </a>
                                </h3>

                                <p>{{ $item->description }}</p>

                                <div class="link">
                                    <a href="javascript:void(0)">
                                        <i class="flaticon-right-arrow"></i>
                                        <span>Read More</span>
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
                            <div class="block-shape"
                                style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/manufacturing.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">Industry Expertise</a></h3>
                            <p>Leveraging years of expertise in metal
                                manufacturing to deliver quality, tailored solutions across industries.</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>Read
                                        More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape"
                                style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/engineer.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">Skilled Workforce</a></h3>
                            <p>Our skilled team handles every project with precision and care, from design to
                                production.
                            </p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>Read
                                        More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape"
                                style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/productivity.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">Timely Delivery</a></h3>
                            <p>We prioritize strict deadlines & ensure your metal products are delivered on time, every
                                time.</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>Read
                                        More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape"
                                style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/target.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">Competitive Pricing</a></h3>
                            <p>Cost-effective solutions allow you to receive quality metal products without exceeding
                                your
                                budget.</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>Read
                                        More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape"
                                style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/test.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">Quality Assurance</a></h3>
                            <p>Rigorous quality control processes ensure the highest level of product reliability.</p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>Read
                                        More</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="light-icon"><i class="flaticon-gear"></i></div>
                            <div class="block-shape"
                                style="background-image: url({{ asset('images/shape/shape-11.png') }});"></div>
                            <div class="icon-box">
                                <div class="icon">
                                    <img src="{{ asset('images/iconpage8/certificate.png') }}" alt="">
                                </div>
                                <div class="bar-shape"></div>
                            </div>
                            <h3><a href="index.html">Industry Recognition</a></h3>
                            <p>We are certified to meet the highest industry standards for quality, safety, and
                                reliability.
                            </p>
                            <div class="link"><a href="index.html"><i class="flaticon-right-arrow"></i><span>Read
                                        More</span></a></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
