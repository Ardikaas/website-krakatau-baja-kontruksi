@extends('layouts.front')

@section('title', 'Company Governance - Krakatau Baja Konstruksi')


@push('styles')
    @vite(['resources/css/news.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1 type="page" title="News" :breadcrumb="[['label' => 'Home', 'url' => url('/')], ['label' => 'Company Governence']]" imagePath="images/background/page-title.jpg" />

    {{-- News Section --}}
    <section class="news-section sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                {{-- News Item 1 --}}
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read
                                            the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read
                                            the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>30</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="#"><img
                                                src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">Metal Finishing Techniques: An In-Depth
                                        Practical Guide.</a></h3>
                                <div class="link-box"><a href="#"><i class="flaticon-right-arrow"></i><span>Read
                                            the
                                            Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/news.js'])
@endpush
