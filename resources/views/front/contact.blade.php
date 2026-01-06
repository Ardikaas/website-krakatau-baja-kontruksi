@extends('layouts.front')
@section('title', 'Contact Us - Krakatau Baja Konstruksi')

@section('meta_description', 'Contact Krakatau Baja Konstruksi for inquiries and steel construction services')

@push('styles')
    @vite(['resources/css/contact.css'])
@endpush

@section('content')
    <x-landingPageSection1 type="page" title="Contact Us" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => 'Contact Us']]" imagePath="images/background/page-title.jpg" />
    <section class="contact-style-two">
        <div class="auto-container">
            <div class="tabs-box">
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape"
                                            style="background-image: url({{ asset('images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>Location</h3>
                                            <h6>Conveniently located to meet.</h6>
                                        </div>
                                        <div class="text-box">
                                            <p>Gedung Krakatau Steel Lantai 2, Jl. jend. Gatot Subroto Kav. 54, Jakarta
                                                12950</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape"
                                            style="background-image: url({{ asset('images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>Reach Us</h3>
                                            <h6>Call or email for assistance.</h6>
                                        </div>
                                        <div class="text-box">
                                            <p><a href="tel:66120003456">[+66] 12 000 3456</a><br /><a
                                                    href="mailto:marketing@bajakonstruksi.co.id">marketing@bajakonstruksi.co.id</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape"
                                            style="background-image: url({{ asset('images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>Business Hours</h3>
                                            <h6>Connect during office hours.</h6>
                                        </div>
                                        <div class="text-box">
                                            <p>Mon - Sat: 9.00 am to 6.00 pm<br /> <span class="text">Sun: Closed</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-style-three">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                    <div class="map-inner">
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55945.16225505631!2d-73.90847969206546!3d40.66490264739892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1601263396347!5m2!1sen!2sbd"
                                width="100%" height="500" frameborder="0" style="border:0; width: 100%"
                                allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="map-content">
                            <h3>Illinois</h3>
                            <p>PT Krakatau Baja Konstruksi, <br />Springfield, IL 62701,USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_35">
                            <h6>Message Us</h6>
                            <h2>Have Questions? <span>[Message]</span> Us</h2>
                        </div>
                        <div class="form-inner">
                            <form method="post" action="sendemail.php" id="contact-form">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-28.png" alt="">
                                            </div>
                                            <input type="text" name="username" placeholder="Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-29.png" alt="">
                                            </div>
                                            <input type="text" name="phone" placeholder="Phone" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-30.png" alt="">
                                            </div>
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-31.png" alt="">
                                            </div>
                                            <div class="select-box">
                                                <select class="wide" style="display: none;">
                                                    <option data-display="Inquiry Type">Inquiry Type</option>
                                                    <option value="1">Fabrication</option>
                                                    <option value="2">Metal Processing</option>
                                                    <option value="3">Metal Casting</option>
                                                    <option value="4">Metal Welding</option>
                                                </select>
                                                <div class="nice-select wide" tabindex="0"><span class="current">Inquiry
                                                        Type</span>
                                                    <ul class="list">
                                                        <li data-value="Inquiry Type" data-display="Inquiry Type"
                                                            class="option selected">Inquiry Type</li>
                                                        <li data-value="1" class="option">Fabrication</li>
                                                        <li data-value="2" class="option">Metal Processing</li>
                                                        <li data-value="3" class="option">Metal Casting</li>
                                                        <li data-value="4" class="option">Metal Welding</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-32.png" alt="">
                                            </div>
                                            <textarea name="message" placeholder="Your Question"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="message-btn">
                                            <button type="submit" class="theme-btn btn-one" name="submit-form"><i
                                                    class="flaticon-right-arrow"></i><span>Submit Now</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- @vite(['resources/js/news.js']) --}}
@endpush
