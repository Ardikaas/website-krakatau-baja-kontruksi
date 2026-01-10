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
                        <h2>Leaders in Precision <span>[Manufacturing]</span></h2>
                    </div>
                    <div class="text-box mb_30">
                        <p>Power choice is untrammelled and when nothing prevents being able trivial example, which of
                            us ever undertake laborious.</p>
                    </div>
                    <div class="inner-box">
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
                    </div>
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
                        <p>We are a trusted leader in metal...</p>
                        <div class="icon-box"><i class="flaticon-factory-1"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>about</h6>
                        <h3>Our Company</h3>
                        <p>We are a trusted leader in metal manufacturing, specializing in precision-crafted solutions
                            for diverse industries.</p>
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
                        <p>To deliver innovative and high-quality... </p>
                        <div class="icon-box"><i class="flaticon-goal"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>about</h6>
                        <h3>Our Mission</h3>
                        <p>To deliver innovative and high-quality manufacturing, specializing in precision-crafted
                            solutions for diverse industries.</p>
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
                        <p>To lead the industry with innovation...</p>
                        <div class="icon-box"><i class="flaticon-business-vision"></i></div>
                    </div>
                    <div class="overlay-content">
                        <h6>about</h6>
                        <h3>Our Vision</h3>
                        <p>To lead the industry with innovation manufacturing, specializing in precision-crafted
                            solutions for diverse industries.</p>
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
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/team/team-1.jpg') }}" alt=""></figure>
                            <div class="experience-box">
                                <h2>17<span>+</span></h2>
                                <h6>Years of <br />experience</h6>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a>G.Davidson</a></h3>
                            <span class="designation">Chief Executive Officer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/team/team-2.jpg') }}" alt=""></figure>
                            <div class="experience-box">
                                <h2>5<span>+</span></h2>
                                <h6>Years of <br />experience</h6>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a>K.Michael</a></h3>
                            <span class="designation">Chief Technology Officer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/team/team-3.jpg') }}" alt=""></figure>
                            <div class="experience-box">
                                <h2>12<span>+</span></h2>
                                <h6>Years of <br />experience</h6>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a>M.Frederick</a></h3>
                            <span class="designation">R&D Specialist</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/team/team-1.jpg') }}" alt=""></figure>
                            <div class="experience-box">
                                <h2>17<span>+</span></h2>
                                <h6>Years of <br />experience</h6>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a>G.Davidson</a></h3>
                            <span class="designation">Chief Executive Officer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/team/team-2.jpg') }}" alt=""></figure>
                            <div class="experience-box">
                                <h2>5<span>+</span></h2>
                                <h6>Years of <br />experience</h6>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a>K.Michael</a></h3>
                            <span class="designation">Chief Technology Officer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/team/team-3.jpg') }}" alt=""></figure>
                            <div class="experience-box">
                                <h2>12<span>+</span></h2>
                                <h6>Years of <br />experience</h6>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a>M.Frederick</a></h3>
                            <span class="designation">R&D Specialist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- team-section end --}}