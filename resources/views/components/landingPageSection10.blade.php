<section class="news-section">
    <div class="auto-container">
        <div class="sec-title mb_45">
            <h6>Blog Post</h6>
            <h2>Explore Company <span>[News]</span></h2>
            <a href="{{ url('blog') }}">
                <i class="flaticon-right-arrow"></i>
                <span>View All Post</span>
            </a>
        </div>

        <div class="two-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">

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
                                <figure class="author-image">
                                    <img src="{{ asset('images/news/author-1.png') }}" alt="Author">
                                </figure>
                                <div class="inner">
                                    <h5>D. Langer</h5>
                                    <button>Follow</button>
                                </div>
                            </div>
                        </div>

                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ url('blog-details') }}">
                                    <img src="{{ asset('images/news/news-1.jpg') }}" alt="News">
                                </a>
                            </figure>

                            <span class="category">Technical Guides</span>

                            <div class="zoom-btn">
                                <a
                                    href="{{ asset('images/news/news-1.jpg') }}"
                                    class="lightbox-image"
                                    data-fancybox="gallery"
                                >
                                    <i class="flaticon-zoom"></i>
                                </a>
                            </div>
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
                                <figure class="author-image">
                                    <img src="{{ asset('images/news/author-1.png') }}" alt="Author">
                                </figure>
                                <div class="inner">
                                    <h5>L. Stella</h5>
                                    <button>Follow</button>
                                </div>
                            </div>
                        </div>

                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ url('blog-details') }}">
                                    <img src="{{ asset('images/news/news-2.jpg') }}" alt="News">
                                </a>
                            </figure>

                            <span class="category">Industry Trends</span>

                            <div class="zoom-btn">
                                <a
                                    href="{{ asset('images/news/news-2.jpg') }}"
                                    class="lightbox-image"
                                    data-fancybox="gallery"
                                >
                                    <i class="flaticon-zoom"></i>
                                </a>
                            </div>
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

        </div>
    </div>
</section>
