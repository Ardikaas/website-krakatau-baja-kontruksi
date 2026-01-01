@extends('layouts.front')

@section('title', 'Detail Berita - Krakatau Baja Konstruksi')

@section('meta_description', 'Detail berita dari Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/newsDetail.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    @include('components.landingPageSection1', [
        'type' => 'hero',
        'title' => 'Produsen|Baja |Berkualitas'
    ])

    {{-- Sidebar Page Container --}}
    <section class="sidebar-page-container pt_120 pb_120">
        <div class="auto-container">
            <div class="row clearfix">
                {{-- Main Content --}}
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="content-one mb_40">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('images/news/news-30.jpg') }}" alt=""></figure>
                                <div class="post-date"><h2>25</h2><span>Dec'24</span></div>
                            </div>
                            <h2>Metal finishing techniques: An in depth practical guide.</h2>
                            <ul class="info-list">
                                <li class="author-box">
                                    <figure class="author-image"><img src="{{ asset('images/news/author-2.png') }}" alt=""></figure>
                                    <div class="inner">
                                        <h5>D.Langer</h5>
                                        <span>Follow</span>
                                    </div>
                                </li>
                                <li>
                                    <h5>Category</h5>
                                    <h6>Technical Guides</h6>
                                </li>
                                <li>
                                    <h5>Reading Time</h5>
                                    <h6>7 Mins</h6>
                                </li>
                            </ul>
                            <div class="text-box mb_30">
                                <p><span>M</span>etallic and dislike men who are so that beguiled and demoralize welcome every pain avoided frequently occur that pleasures indignations and dislike men who ar beguiled matters always</p>
                                <p class="mb_20">the charms of pleasure of the moment, so blinded by desire that they cannot foresee the pain trouble that are bound to ensue equal blame belongs to those who fail in their duty through our weakness of same as saying through shrinking our being able to do.</p>
                                <p class="mb_20">Foresee the pain trouble that are bound to ensue equal blame belongs to those who fail in their duties which is the same as saying through shrinking annoying consequences.</p>
                                <p>Our being able to do what we like best, every pleasure is to be welcomed and every pain avoided butin certain that matters to this principle circumstances and owing to the claims.foresee the pain troublethat are bound to ensue equal blame belongs to those who fail in their duty through weakness of will,which is the same as saying through shrinking.</p>
                            </div>
                            <blockquote>
                                <div class="icon-box"><i class="flaticon-quote"></i></div>
                                <h3>Achieve durability and aesthetics with expert metal
                                    finishing techniques and precision.</h3>
                                <h6>by Silver Scott, <a href="#">@silver/facebook.com</a></h6>
                            </blockquote>
                            <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do know how to pursue pleasure rationally encounter consequences that are extremely painful or again is there anyone who loves or pursues or desires to obtain pain of itself, because it pain, but because occasionally circumstances matters to this principle of selection.</p>
                        </div>
                        
                        <div class="content-two mb_40">
                            <div class="text-box mb_20">
                                <h3>Different Finishing Techniques</h3>
                                <p>Trouble that are bound to ensure equal blame belongs to those who fail their dutythrough weaknesswhich is all the same as saying through shrinkings our being able do what we like best every pleasure welcomed and every pain avoided.</p>
                            </div>
                            <ul class="list-item clearfix">
                                <li><i class="flaticon-nut-1"></i><span>Polishing:</span> No one rejects, dislikes, or avoids pleasure itself because pleasure but because those who do not know how to pursue occur.</li>
                                <li><i class="flaticon-nut-1"></i><span>Sandblasting:</span> Beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble.</li>
                                <li><i class="flaticon-nut-1"></i><span>Coating:</span> Through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice.</li>
                            </ul>
                        </div>
                        
                        <div class="content-three pb_55">
                            <div class="text-box mb_20">
                                <h3>Benefits of Quality Metal Finishing</h3>
                                <p>Trouble that are bound to ensure equal blame belongs to those who fail their dutythrough weaknesswhich is all the same as saying through shrinkings our being able do what we like best every pleasure welcomed and every pain avoided.</p>
                            </div>
                            <div class="inner-box">
                                <h3>Benefits</h3>
                                <ul class="list-item clearfix mb_45">
                                    <li><i class="flaticon-check-circle"></i>Creates surfaces that are easier to clean and maintain.</li>
                                    <li><i class="flaticon-check-circle"></i>Protects metal from corrosion, rust, and wear, extending its lifespan.</li>
                                    <li><i class="flaticon-check-circle"></i>Provides a smooth, polished, and visually appealing surface.</li>
                                    <li><i class="flaticon-check-circle"></i>Shields metal against environmental factors.</li>
                                </ul>
                            </div>
                            <div class="post-tags">
                                <h5><i class="flaticon-tags"></i><span>Post Tags:</span></h5>
                                <ul class="tags-list">
                                    <li><a href="#">Innovation</a></li>
                                    <li><a href="#">Metal</a></li>
                                    <li><a href="#">Quality</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="post-nav mb_50">
                            <div class="post-nav-btn mb_35">
                                <div class="single-btn">
                                    <figure class="image-box"><img src="{{ asset('images/news/btn-1.jpg') }}" alt=""></figure>
                                    <div class="inner">
                                        <h6><i class="flaticon-right"></i><a href="#">Prev</a></h6>
                                        <h5><a href="#">The Benefits of Custom <br />
                                            Metal Fabrication</a></h5>
                                    </div>
                                </div>
                                <div class="single-btn align-3">
                                    <div class="inner">
                                        <h6><a href="#">Next</a><i class="flaticon-right"></i></h6>
                                        <h5><a href="#">Common Challenges in <br />
                                            Metal Fabrication</a></h5>
                                    </div>
                                    <figure class="image-box"><img src="{{ asset('images/news/btn-2.jpg') }}" alt=""></figure>
                                </div>
                            </div>
                            <div class="btn-box">
                                <a href="{{ route('news') }}"><i class="flaticon-more"></i><span>Back to Blog Post</span></a>
                            </div>
                        </div>
                        
                        <div class="comment-box mb_40">
                            <div class="text-box pb_10">
                                <h3>Comments</h3>
                            </div>
                            <div class="comment-inner">
                                <div class="single-comment-box">
                                    <figure class="image-box"><img src="{{ asset('images/news/comment-1.jpg') }}" alt=""></figure>
                                    <div class="inner">
                                        <h4>Steven Rich, <span>08 August, 2024 / 10.15 am</span></h4>
                                        <p>Gain is there anyone who loves or pursues or desires to obtain pain of itself, because occur in which toil and pain can procure him some great.</p>
                                        <h6><a href="#"><i class="flaticon-reply-all"></i><span>Reply</span></a></h6>
                                    </div>
                                </div>
                                <div class="single-comment-box">
                                    <figure class="image-box"><img src="{{ asset('images/news/comment-2.jpg') }}" alt=""></figure>
                                    <div class="inner">
                                        <h4>Liam Benjamin, <span>09 August, 2024 / 04.20 pm</span></h4>
                                        <p>Ever undertakes laborious physical exercise, except to obtain some advantages from it but who has any right to find fault.</p>
                                        <h6><a href="#"><i class="flaticon-reply-all"></i><span>Reply</span></a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="comment-form-area">
                            <div class="text-box mb_30">
                                <h3>Leave Your Comments</h3>
                                <p>Your email address will not be published. Required fields are marked*</p>
                            </div>
                            <div class="form-inner">
                                <form action="#" method="post">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Comments"></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="name" placeholder="Name*" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="Email*" required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <div class="check-box-two pt_6">
                                                <input class="check" type="checkbox" id="checkbox2">
                                                <label for="checkbox2">Save my name, email, and website in this browser for the next time I comment.</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one"><i class="flaticon-right-arrow"></i><span>Post Comment</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Sidebar --}}
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="search-widget sidebar-widget mb_40">
                            <form action="#" method="get">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search..." required>
                                    <button type="submit"><i class="flaticon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="category-widget sidebar-widget mb_30">
                            <div class="widget-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li><a href="#"><span class="text">Company</span><span class="count">06</span><i class="flaticon-right"></i></a></li>
                                    <li><a href="#"><span class="text">Industry Trends</span><span class="count">02</span><i class="flaticon-right"></i></a></li>
                                    <li><a href="#"><span class="text">Maintenance</span><span class="count">12</span><i class="flaticon-right"></i></a></li>
                                    <li><a href="#"><span class="text">Supplier</span><span class="count">09</span><i class="flaticon-right"></i></a></li>
                                    <li><a href="#"><span class="text">Technical Guides</span><span class="count">05</span><i class="flaticon-right"></i></a></li>
                                    <li><a href="#"><span class="text">Quality Control</span><span class="count">14</span><i class="flaticon-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="post-widget sidebar-widget mb_40">
                            <div class="widget-title">
                                <h3>Popular Post</h3>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-image"><a href="#"><img src="{{ asset('images/news/post-1.jpg') }}" alt=""></a></figure>
                                    <div class="inner">
                                        <h6>Dec 30, 2024</h6>
                                        <h5><a href="#">The Benefits of Custom
                                            Metal Fabrication</a></h5>
                                    </div>
                                </div>
                                <div class="post">
                                    <figure class="post-image"><a href="#"><img src="{{ asset('images/news/post-2.jpg') }}" alt=""></a></figure>
                                    <div class="inner">
                                        <h6>May 14, 2024</h6>
                                        <h5><a href="#">Common Challenges in
                                            Metal Fabrication</a></h5>
                                    </div>
                                </div>
                                <div class="post">
                                    <figure class="post-image"><a href="#"><img src="{{ asset('images/news/post-3.jpg') }}" alt=""></a></figure>
                                    <div class="inner">
                                        <h6>Apr 10, 2024</h6>
                                        <h5><a href="#">Key Benefits of Custom
                                            Fabrication</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tags-widget sidebar-widget pb_45">
                            <div class="widget-title">
                                <h3>Popular Tags</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="tags-list clearfix">
                                    <li><a href="#">CNC Machining</a></li>
                                    <li><a href="#">Equipment</a></li>
                                    <li><a href="#">Innovation</a></li>
                                    <li><a href="#">Metal</a></li>
                                    <li><a href="#">Quality</a></li>
                                    <li><a href="#">Science</a></li>
                                    <li><a href="#">Steel Solutions</a></li>
                                    <li><a href="#">Techniques</a></li>
                                    <li><a href="#">Trends</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="subscribe-widget">
                            <div class="inner-box">
                                <div class="light-icon"><img src="{{ asset('images/icons/icon-34.png') }}" alt=""></div>
                                <h4>Updates</h4>
                                <div class="icon-box align-3">
                                    <div class="icon"><img src="{{ asset('images/icons/icon-33.png') }}" alt=""></div>
                                </div>
                                <h3>Stay Updated <br />with the <span>Latest Trends.</span></h3>
                                <div class="form-inner">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email address" required>
                                            <button type="submit"><i class="flaticon-right-arrow"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/newsDetail.js'])
@endpush
