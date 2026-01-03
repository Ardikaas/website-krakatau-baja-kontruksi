@extends('layouts.front')

@section('title', 'Berita - Krakatau Baja Konstruksi')

@section('meta_description', 'Berita terbaru dari Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/news.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1
        type="page"
        title="Berita"
        :breadcrumb="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Berita'],
        ]"
    />

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
                                        <figure class="author-image"><img src="{{ asset('images/news/author-1.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>D. Langer</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 1) }}"><img src="{{ asset('images/news/news-1.jpg') }}" alt=""></a></figure>
                                    <span class="category">Technical Guides</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-1.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 1) }}">Metal Finishing Techniques: An In-Depth
                                    Practical Guide.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 1) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- News Item 2 --}}
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>25</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <figure class="author-image"><img src="{{ asset('images/news/author-2.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>L. Stella</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 2) }}"><img src="{{ asset('images/news/news-2.jpg') }}" alt=""></a></figure>
                                    <span class="category">Industry Trends</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-2.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 2) }}">The Difference Between Forging & Casting
                                    in Metal Manufacturing.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 2) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- News Item 3 --}}
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>14</h3>
                                        <p>November, 2024</p>
                                    </div>
                                    <div class="author-box">
                                        <figure class="author-image"><img src="{{ asset('images/news/author-3.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>E.Fransis</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 3) }}"><img src="{{ asset('images/news/news-8.jpg') }}" alt=""></a></figure>
                                    <span class="category">Quality Control</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-8.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 3) }}">How to Choose the Right Metal for Your Unique Project Needs.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 3) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- News Item 4 --}}
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
                                        <figure class="author-image"><img src="{{ asset('images/news/author-1.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>D.Langer</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 4) }}"><img src="{{ asset('images/news/news-9.jpg') }}" alt=""></a></figure>
                                    <span class="category">Technical Guides</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-9.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 4) }}">Metal Finishing Techniques: An In-Depth
                                    Practical Guide.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 4) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- News Item 5 --}}
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>25</h3>
                                        <p>December, 2025</p>
                                    </div>
                                    <div class="author-box">
                                        <figure class="author-image"><img src="{{ asset('images/news/author-2.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>L.Grayson</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 5) }}"><img src="{{ asset('images/news/news-10.jpg') }}" alt=""></a></figure>
                                    <span class="category">Industry Trends</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-10.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 5) }}">The Difference Between Forging &amp; Casting
                                    in Metal Manufacturing.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 5) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- News Item 6 --}}
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>14</h3>
                                        <p>November, 2024</p>
                                    </div>
                                    <div class="author-box">
                                        <figure class="author-image"><img src="{{ asset('images/news/author-3.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>E.Fransis</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 6) }}"><img src="{{ asset('images/news/news-11.jpg') }}" alt=""></a></figure>
                                    <span class="category">Quality Control</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-11.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 6) }}">How to Choose the Right Metal for Your Unique Project Needs.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 6) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- News Item 7 --}}
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>10</h3>
                                        <p>October, 2024</p>
                                    </div>
                                    <div class="author-box">
                                        <figure class="author-image"><img src="{{ asset('images/news/author-1.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>D.Langer</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 7) }}"><img src="{{ asset('images/news/news-12.jpg') }}" alt=""></a></figure>
                                    <span class="category">Maintenance</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-12.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 7) }}">Understanding the Properties of
                                    Different Metal Alloys.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 7) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- News Item 8 --}}
                <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>05</h3>
                                        <p>September, 2024</p>
                                    </div>
                                    <div class="author-box">
                                        <figure class="author-image"><img src="{{ asset('images/news/author-2.png') }}" alt=""></figure>
                                        <div class="inner">
                                            <h5>L. Stella</h5>
                                            <button>Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('news.detail', 8) }}"><img src="{{ asset('images/news/news-13.jpg') }}" alt=""></a></figure>
                                    <span class="category">Company News</span>
                                    <div class="zoom-btn"><a href="{{ asset('images/news/news-13.jpg') }}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a></div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="{{ route('news.detail', 8) }}">Steel Industry Update: Key Trends
                                    and Future Outlook.</a></h3>
                                <div class="link-box"><a href="{{ route('news.detail', 8) }}"><i class="flaticon-right-arrow"></i><span>Read the Post</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="pagination-wrapper centred pt_20 pb_20">
                <ul class="pagination">
                    <li><a href="{{ route('news') }}"><i class="flaticon-right"></i><span>Prev</span></a></li>
                    <li><a href="{{ route('news') }}" class="current">01</a></li>
                    <li><div class="bar"></div></li>
                    <li><a href="{{ route('news') }}">02</a></li>
                    <li><div class="bar"></div></li>
                    <li><a href="{{ route('news') }}">03</a></li>
                    <li><a href="{{ route('news') }}"><span>Next</span><i class="flaticon-right"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/news.js'])
@endpush
