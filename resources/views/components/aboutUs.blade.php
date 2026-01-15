{{-- About Style Three Section --}}
<section class="about-style-three alternat-2">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image-box">
                    <figure class="image image-1"><img src="{{ asset('images/resource/about-3.jpg') }}" alt=""></figure>
                    <figure class="image image-2"><img src="{{ asset('images/resource/about-4.jpg') }}" alt=""></figure>
                    <figure class="image image-3"><img src="{{ asset('images/resource/about-5.jpg') }}" alt=""></figure>
                    <span class="rotate-text">Since, 1992</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <div class="sec-title mb_35">
                        <h6>About Us</h6>
                        <h2>Precision <span>[Steel]</span> for Sustainable Growth</h2>
                    </div>
                    <div class="text-box mb_30 text-justify">
                        <p>PT Krakatau Baja Konstruksi was established in 1992. Currently, it has become a leading steel producer in Indonesia. Our company produces high-quality products such as Deformed Bar, Plain Bar, Equal Angle, Channel, Wide Flange, H Beam and I Beam. As a subsidiary of PT Krakatau Steel, with 99.9997% share ownership by PT Krakatau Steel and 0.0003% by PT Krakatau Engineering, we are always committed to prioritizing product quality and customer satisfaction. We are ready to anticipate the global era and ready to compete in the third millennium.</p>
                    </div>
                    {{-- <div class="inner-box">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 left-column">
                                <div class="left-content">
                                    <h3>Industry Expertise</h3>
                                    <p>Perfectly simple and easy to freek
                                        hours nothing prevent...</p>
                                    <ul class="list-item clearfix">
                                        <li><img src="{{ asset('images/icons/icon-27.png') }}" alt=""><span>Decades of
                                                Manufacturing</span></li>
                                        <li><img src="{{ asset('images/icons/icon-27.png') }}" alt=""><span>High-Quality
                                                Steel</span></li>
                                        <li><img src="{{ asset('images/icons/icon-27.png') }}" alt=""><span>Serving
                                                Diverse Industries</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 award-column">
                                <div class="award-box">
                                    <h4>awards</h4>
                                    <div class="award-image align-3"><img src="{{ asset('images/icons/award-2.png') }}"
                                            alt=""></div>
                                    <h6>2024</h6>
                                    <h5>Global Industry
                                        Leadership Award</h5>
                                    <span class="text">by gma</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
{{-- about-style-three end --}}


{{-- history-section --}}
@php
$histories = [
    ['year' => 1985, 'image' => 'history-1.jpg', 'title' => 'Foundation Year 1985'],
    ['year' => 1988, 'image' => 'history-1.jpg', 'title' => 'Foundation Year 1988'],
    ['year' => 1990, 'image' => 'history-1.jpg', 'title' => 'Foundation Year 1990'],
    ['year' => 1993, 'image' => 'history-1.jpg', 'title' => 'Foundation Year 1993'],
    ['year' => 1999, 'image' => 'history-1.jpg', 'title' => 'Foundation Year 1999'],
    ['year' => 2000, 'image' => 'history-1.jpg', 'title' => 'Foundation Year 2000'],
    ['year' => 2002, 'image' => 'history-1.jpg', 'title' => 'Foundation Year 2000'],
];
@endphp

<section class="history-section bg-color-1">
    <div class="outer-container">

        <div class="sec-title centred mb_45">
            <h6>History</h6>
            <h2>A <span>[Timeline]</span> of Precision <br />& Innovation</h2>
        </div>

        <!-- CAROUSEL -->
        <div class="history-carousel owl-carousel">
            @foreach ($histories as $item)
                <div class="history-item">
                    <div class="history-inner">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="history-image">
                                    <img src="{{ asset('images/resource/'.$item['image']) }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="history-content">
                                    <div class="title-text">
                                        <div class="title-shape"></div>
                                        <h2>{{ $item['title'] }}</h2>
                                    </div>
                                    <p>Our journey began in 1980 with the establishment of a small yet ambitious metal
                                        workshop. Focused on precision craftsmanship, we laidthe foundation for a
                                        company built on quality, innovation, and a commitment to meeting client needs.
                                    </p>
                                    <h5>Built on precision and passion.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <nav class="history-nav">
            <ul class="history-years">
                @foreach ($histories as $index => $item)
                    <li data-index="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}">
                        {{ $item['year'] }}
                    </li>
                @endforeach
            </ul>
        </nav>
        

    </div>
</section>
{{-- history-section end --}}


{{-- company-section --}}
<section class="company-section">
    <div class="bg-layer" style="background-image: url({{ asset('images/background/company-bg.jpg') }});"></div>
    <div class="outer-container">
        <div class="outer-box clearfix">
            <div class="title-column">
                <div class="sec-title light">
                    <h6>Company</h6>
                    <h2>Driven by Innovation, Built on Trust</h2>
                </div>
            </div>
            <div class="single-column">
                <div class="inner-box">
                    <div class="static-content">
                        <h6>about</h6>
                        <h3>Our Company</h3>
                        <p>We are a trusted leader in steel...</p>
                        <div class="icon-box"><i class="flaticon-factory-1"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>about</h6>
                        <h3>Our Company</h3>
                        <p>We are a trusted leader in steel manufacturing, providing high-quality and reliable solutions for national and industrial development.</p>
                        <h4>Journey of Excellence</h4>
                        <ul class="list-item clearfix">
                            <li>Growth & Innovation</li>
                            <li>Industry Leadership</li>
                            <li>Commitment to Quality</li>
                        </ul>
                        <div class="download-box">
                            <button type="button"></button>
                            <div class="icon-box"><i class="flaticon-brochure"></i></div>
                            <div class="inner">
                                <h4>Profile Brochure</h4>
                                <span>pdf(3.5mb)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-column">
                <div class="inner-box">
                    <div class="static-content">
                        <h6>about</h6>
                        <h3>Our Vision</h3>
                        <p>To become a competitive, profitable... </p>
                        <div class="icon-box"><i class="flaticon-business-vision"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>about</h6>
                        <h3>Our Vision</h3>
                        <p>To become a competitive, profitable, and trusted corporation.</p>
                        <h4>Journey of Excellence</h4>
                        <ul class="list-item clearfix">
                            <li>Growth & Innovation</li>
                            <li>Industry Leadership</li>
                            <li>Commitment to Quality</li>
                        </ul>
                        <div class="download-box">
                            <button type="button"></button>
                            <div class="icon-box"><i class="flaticon-brochure"></i></div>
                            <div class="inner">
                                <h4>Profile Brochure</h4>
                                <span>pdf(3.5mb)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-column">
                <div class="inner-box">
                    <div class="static-content">
                        <h6>about</h6>
                        <h3>Our Mission</h3>
                        <p>To achieve productive and efficient...</p>
                        <div class="icon-box"><i class="flaticon-goal"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>about</h6>
                        <h3>Our Mission</h3>
                        <ul class="list-item clearfix">
                            <li>To achieve productive and efficient operational performance in delivering high-quality and profitable products and services.</li>
                            <li>Develop the steel business through mutually beneficial partnerships with strategic partners.</li>
                            <li>Expand steel solution applications and downstream steel products to enhance added value and customer satisfaction.</li>
                            <li>Increase group business value by making positive contributions and optimizing the supply chain.</li>
                            <li>Develop top-tier talent capable of contributing optimally across all business processes.</li>
                        </ul>
                        <div class="download-box">
                            <button type="button"></button>
                            <div class="icon-box"><i class="flaticon-brochure"></i></div>
                            <div class="inner">
                                <h4>Profile Brochure</h4>
                                <span>pdf(3.5mb)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- company-section end --}}


{{-- chooseus-style-two --}}
<section class="organization-structure">
    <div class="auto-container">

        <div class="sec-title centred mb_45">
            <h6>Organization Structure</h6>
            <h2>Our <span>[Organization]</span> Structure</h2>
            <p class="mt_12">
                Organizational structure designed to ensure efficiency and clear responsibility.
            </p>
        </div>

        <div class="structure-wrapper">
            <div class="structure-image">
                <img
                    src="{{ asset('images/background/company-bg.jpg') }}"
                    alt="Organization Structure"
                />
            </div>
        </div>

    </div>
</section>

{{-- chooseus-style-two end --}}

{{-- team-section --}}
<section class="team-section">
    <div class="auto-container">
        <div class="sec-title centred mb_45">
            <h6>Team Members</h6>
            <h2>Passionate <span>[Team]</span> at Work</h2>
            <p class="mt_12">Experts working together to achieve excellence.</p>
        </div>
        <div class="container-team">
        <!-- Tabs -->
        <div class="tab-wrapper">
            <button class="tab active" data-tab="komisaris">Dewan Komisaris</button>
            <button class="tab" data-tab="direksi">Direksi</button>
        </div>

        <!-- Dewan Komisaris -->
        <div class="image-wrapper active" id="komisaris">
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>           
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>           
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>           
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>           
        </div>

        <!-- Direksi -->
        <div class="image-wrapper" id="direksi">
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>   
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>   
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>   
            <div class="image-card">
                <img src="input.jpg" alt="" />
                <div class="card-overlay">
                    <h4>John Doe</h4>
                    <span>Komisaris Utama</span>
                </div>
            </div>              
        </div>
        </div>
    </div>
</section>
{{-- team-section end --}}

<section class="chooseus-style-two">
    <div class="auto-container">
        <div class="sec-title mb_25 centred">
            <h6>Cultural Values</h6>
            <h2>Core Values <span>(AKHLAK)</span></h2>
            <p class="mt_12">The core values ​that form the basis of BUMN work culture.</p>
        </div>

        <div class="row align-items-center">
            <!-- LEFT COLUMN -->
            <div class="col-lg-4 col-md-12 col-sm-12 left-column">
                <div class="left-content">

                    <!-- Amanah -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Amanah
                            </h3>
                            <p>
                                We uphold the trust that has been placed in us.
                            </p>
                        </div>
                    </div>

                    <!-- Kompeten -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-brain"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Competent
                            </h3>
                            <p>
                                We continuously learn and develop our capabilities.
                            </p>
                        </div>
                    </div>

                    <!-- Harmonis -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Harmonious
                            </h3>
                            <p>
                                We care for one another and respect differences.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CENTER IMAGE -->
            <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                <div class="image-box">
                    <figure class="image"><img src="{{ asset('images/resource/chooseus-1.jpg') }}"
                        alt=""></figure>
                </div>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-lg-4 col-md-12 col-sm-12 right-column">
                <div class="right-content align-3">

                    <!-- Loyal -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-flag"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Loyal
                            </h3>
                            <p>
                                We are dedicated and prioritize the interests of the nation and the state.
                            </p>
                        </div>
                    </div>

                    <!-- Adaptif -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Adaptive
                            </h3>
                            <p>
                                We continuously innovate and remain enthusiastic in driving and responding to change.
                            </p>
                        </div>
                    </div>

                    <!-- Kolaboratif -->
                    <div class="chooseus-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <h3>
                                <i class="flaticon-thunder-bolt"></i>Collaborative
                            </h3>
                            <p>
                                We build synergistic and mutually beneficial partnerships.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
