@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp



<section class="news-section">
    <div class="auto-container">
        <div class="sec-title mb_45">
            <h6>Blog Post</h6>
            <h2>Explore Company <span>[News]</span></h2>
        </div>

        <div class="two-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            @if (isset($news) && $news->count())
                @foreach ($news as $item)
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="upper-content z_1">
                                <div class="info-box">
                                    <div class="post-date">
                                        <h3>{{ Carbon::parse($item->published_at)->format('d') }}</h3>
                                        <p>{{ Carbon::parse($item->published_at)->format('F, Y') }}</p>
                                    </div>

                                    <div class="author-box">
                                        <div class="inner">
                                            <h5>{{ $item->author }}</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ url('news/' . $item->id) }}">
                                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                                        </a>
                                    </figure>
                                </div>
                            </div>

                            <div class="lower-content">
                                <h3>
                                    <a href="{{ url('news/' . $item->id) }}">
                                        {{ Str::limit($item->title, 70) }}
                                    </a>
                                </h3>

                                <div class="link-box">
                                    <a href="{{ url('news/' . $item->id) }}">
                                        <i class="flaticon-right-arrow"></i>
                                        <span>Read the Post</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- NEWS ITEM 1 --}}
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
                                <figure class="image">
                                    <a href="{{ url('blog-details') }}">
                                        <img src="{{ asset('images/news/news-1.jpg') }}" alt="News">
                                    </a>
                                </figure>
                            </div>
                        </div>

                        <div class="lower-content">
                            <h3>
                                <a href="{{ url('blog-details') }}">
                                    Metal Finishing Techniques: An In-Depth Practical Guide.
                                </a>
                            </h3>

                            <div class="link-box">
                                <a href="{{ url('blog-details') }}">
                                    <i class="flaticon-right-arrow"></i>
                                    <span>Read the Post</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NEWS ITEM 2 --}}
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="upper-content z_1">
                            <div class="info-box">
                                <div class="post-date">
                                    <h3>25</h3>
                                    <p>December, 2025</p>
                                </div>

                                <div class="author-box">
                                    <div class="inner">
                                        <h5>L. Stella</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ url('blog-details') }}">
                                        <img src="{{ asset('images/news/news-2.jpg') }}" alt="News">
                                    </a>
                                </figure>
                            </div>
                        </div>

                        <div class="lower-content">
                            <h3>
                                <a href="{{ url('blog-details') }}">
                                    The Difference Between Forging & Casting in Metal Manufacturing.
                                </a>
                            </h3>

                            <div class="link-box">
                                <a href="{{ url('blog-details') }}">
                                    <i class="flaticon-right-arrow"></i>
                                    <span>Read the Post</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NEWS ITEM 3 --}}
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="upper-content z_1">
                            <div class="info-box">
                                <div class="post-date">
                                    <h3>2</h3>
                                    <p>January, 2025</p>
                                </div>

                                <div class="author-box">
                                    <div class="inner">
                                        <h5>D. Langer</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ url('blog-details') }}">
                                        <img src="{{ asset('images/news/news-1.jpg') }}" alt="News">
                                    </a>
                                </figure>
                            </div>
                        </div>

                        <div class="lower-content">
                            <h3>
                                <a href="{{ url('blog-details') }}">
                                    Metal Finishing Techniques: An In-Depth Practical Guide.
                                </a>
                            </h3>

                            <div class="link-box">
                                <a href="{{ url('blog-details') }}">
                                    <i class="flaticon-right-arrow"></i>
                                    <span>Read the Post</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NEWS ITEM 4 --}}
                <div class="news-block-one">
                    <div class="inner-box">
                        <div class="upper-content z_1">
                            <div class="info-box">
                                <div class="post-date">
                                    <h3>10</h3>
                                    <p>February, 2025</p>
                                </div>

                                <div class="author-box">
                                    <div class="inner">
                                        <h5>L. Stella</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ url('blog-details') }}">
                                        <img src="{{ asset('images/news/news-2.jpg') }}" alt="News">
                                    </a>
                                </figure>
                            </div>
                        </div>

                        <div class="lower-content">
                            <h3>
                                <a href="{{ url('blog-details') }}">
                                    The Difference Between Forging & Casting in Metal Manufacturing.
                                </a>
                            </h3>

                            <div class="link-box">
                                <a href="{{ url('blog-details') }}">
                                    <i class="flaticon-right-arrow"></i>
                                    <span>Read the Post</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
