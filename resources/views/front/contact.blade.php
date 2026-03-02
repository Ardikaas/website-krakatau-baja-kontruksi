@extends('layouts.front')
@section('title', 'Contact Us - Krakatau Baja Konstruksi')

@section('meta_description', 'Contact Krakatau Baja Konstruksi for inquiries and steel construction services')

@push('styles')
    @vite(['resources/css/contact.css'])
@endpush

@section('content')
    <x-landingPageSection1 type="page" title="{{ __('messages.page_contact') }}" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => __('messages.page_contact')]]" imagePath="images/background/page-title.jpg" />
    <section class="contact-style-two">
        <div class="auto-container">
            <div class="tabs-box">
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="row justify-content-center">
                            {{-- Marketing Location Card --}}
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape"
                                            style="background-image: url({{ asset('images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>{{ __('messages.marketing_location') }}</h3>
                                            <h6>{{ __('messages.conveniently_located') }}</h6>
                                        </div>
                                        <div class="text-box">
                                            <p>Jl. Jend. Gatot Subroto Kav. 54, Jakarta Selatan, DKI Jakarta.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Factory Location Card --}}
                            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                <div class="info-block-one">
                                    <div class="inner-box">
                                        <div class="shape"
                                            style="background-image: url({{ asset('images/shape/shape-24.png') }});"></div>
                                        <div class="title-box">
                                            <h3>{{ __('messages.factory_location') }}</h3>
                                            <h6>{{ __('messages.conveniently_located') }}</h6>
                                        </div>
                                        <div class="text-box">
                                            <p>Gedung krakatau steel Lt.2 Jalan Industri no 5 PO Box 125, Cilegon, Banten.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Sales Contact Cards (from database) --}}
                            @foreach($sales as $sale)
                                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="shape"
                                                style="background-image: url({{ asset('images/shape/shape-24.png') }});"></div>
                                            <div class="title-box with-image">
                                                <div class="title-image">
                                                    @if($sale->photo)
                                                        <img src="{{ route('sales.image', $sale->photo) }}" alt="{{ $sale->name }}">
                                                    @else
                                                        <img src="{{ asset('images/contact/default-sales.png') }}" alt="{{ $sale->name }}">
                                                    @endif
                                                </div>
                                                <div class="title-text">
                                                    <h3>{{ __('messages.sales_contact') }}</h3>
                                                    <h6>{{ $sale->name }}</h6>
                                                </div>
                                            </div>
                                            <div class="text-box">
                                                <p>
                                                    <a href="tel:{{ $sale->contact }}">[+62] {{ substr($sale->contact, 1) }}</a><br />
                                                    <a href="mailto:marketing@bajakonstruksi.co.id">marketing@bajakonstruksi.co.id</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.914641055292!2d106.03269567603526!3d-6.006458659003942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418e3979cba7f5%3A0x8e2de3f16883d889!2sPT%20Krakatau%20Baja%20Konstruksi%20(Krakatau%20Steel%20Group)!5e0!3m2!1sid!2sid!4v1769059461544!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        {{-- <div class="map-content">
                            <h3>PT Krakatau Baja Konstruksi</h3>
                            <p>Gedung Krakatau Steel <br />Lantai 2, Jl. jend. Gatot Subroto Kav. 54, Jakarta
                                                12950</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_35">
                            <h6>{{ __('messages.message_us') }}</h6>
                            <h2>{!! __('messages.have_questions') !!}</h2>
                        </div>
                        <div class="form-inner">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('contact.send') }}" id="contact-form">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-28.png" alt="">
                                            </div>
                                            <input type="text" name="username" placeholder="{{ __('messages.form_name') }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-29.png" alt="">
                                            </div>
                                            <input type="text" name="phone" placeholder="{{ __('messages.form_phone') }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-30.png" alt="">
                                            </div>
                                            <input type="email" name="email" placeholder="{{ __('messages.form_email') }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box"><img src="images/icons/icon-31.png" alt="">
                                            </div>
                                            <div class="select-box">
                                                <select name="inquiry_type" class="wide" required>
                                                    <option value="">{{ __('messages.inquiry_type') }}</option>
                                                    <option value="Fabrication">{{ __('messages.inquiry_fabrication') }}</option>
                                                    <option value="Metal Processing">{{ __('messages.inquiry_metal_processing') }}</option>
                                                    <option value="Metal Casting">{{ __('messages.inquiry_metal_casting') }}</option>
                                                    <option value="Metal Welding">{{ __('messages.inquiry_metal_welding') }}</option>
                                                </select>

                                                {{-- <div class="nice-select wide" tabindex="0"><span class="current">Inquiry
                                                        Type</span>
                                                    <ul class="list">
                                                        <li data-value="Inquiry Type" data-display="Inquiry Type"
                                                            class="option selected">Inquiry Type</li>
                                                        <li data-value="1" class="option">Fabrication</li>
                                                        <li data-value="2" class="option">Metal Processing</li>
                                                        <li data-value="3" class="option">Metal Casting</li>
                                                        <li data-value="4" class="option">Metal Welding</li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="form-group">
                                            <div class="icon-box-question"><img src="images/icons/icon-32.png"
                                                    alt="">
                                            </div>
                                            <textarea name="message" placeholder="{{ __('messages.form_question') }}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 single-column">
                                        <div class="message-btn">
                                            <button type="submit" class="theme-btn btn-one" name="submit-form"><i
                                                    class="flaticon-right-arrow"></i><span>{{ __('messages.submit_now') }}</span></button>
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
