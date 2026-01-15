@extends('layouts.front')

@section('title', 'Detail Berita - Krakatau Baja Konstruksi')

@section('meta_description', 'Detail berita dari Krakatau Baja Konstruksi')

@push('styles')
    @vite(['resources/css/newsDetail.css'])
@endpush

@section('content')
    {{-- Banner Top Section --}}
    <x-landingPageSection1 type="page" title="News" :breadcrumb="[
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'News', 'url' => route('news')],
        ['label' => $news->title],
    ]" imagePath="images/background/page-title.jpg" />

    {{-- Sidebar Page Container --}}
    <section class="sidebar-page-container pt_120 pb_120">
        <div class="auto-container">
            <div class="row clearfix">
                {{-- Main Content --}}
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="content-one mb_40">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{ $news->image_url }}" alt="{{ $news->title }}">
                                </figure>
                                <div class="post-date">
                                    <h2>{{ \Carbon\Carbon::parse($news->published_at)->format('d') }}</h2>
                                    <span>{{ \Carbon\Carbon::parse($news->published_at)->format('M Y') }}</span>
                                </div>
                            </div>
                            <h2>
                                {{ $news->title }}
                                <span class="author"> - {{ $news->author }}</span>
                            </h2>
                            <div class="text-box mb_30">
                                @php
                                    $content = $news->content;

                                    $plainText = strip_tags($content);
                                    $firstChar = mb_substr($plainText, 0, 1);
                                    $restContent = preg_replace(
                                        '/^[\s\S]*?' . preg_quote($firstChar, '/') . '/',
                                        '',
                                        $content,
                                        1,
                                    );
                                @endphp

                                <p>
                                    <span>{{ $firstChar }}</span>{!! $restContent !!}
                                </p>
                            </div>
                        </div>
                        <div class="post-nav mb_50">
                            <div class="btn-box">
                                <a href="/"><i class="flaticon-more"></i><span>Back to Home</span></a>
                            </div>
                        </div>

                        <div class="comment-box mb_40">
                            <div class="text-box pb_10">
                                <h3>Comments</h3>
                            </div>
                            <div class="comment-inner">
                                @forelse ($comments as $comment)
                                    <div class="single-comment-box">
                                        <div class="inner">
                                            <h4>
                                                {{ $comment->name }},
                                                <span>{{ $comment->created_at->format('d F Y / H.i') }}</span>
                                            </h4>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <p>No comments yet.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="comment-form-area">
                            <div class="text-box mb_30">
                                <h3>Leave Your Comments</h3>
                                <p>Your email address will not be published. Required fields are marked*</p>
                            </div>
                            <div class="form-inner">
                                <form action="{{ route('news.commentStore', $news->id) }}" method="POST">
                                    @csrf
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
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one"><i
                                                    class="flaticon-right-arrow"></i><span>Post Comment</span></button>
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
                        <div class="post-widget sidebar-widget mb_40">
                            <div class="widget-title">
                                <h3>Latest Post</h3>
                            </div>
                            <div class="post-inner">
                                @foreach ($latestNews as $item)
                                    <div class="post">
                                        <figure class="post-image">
                                            <a href="{{ url('news/' . $item->id) }}">
                                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                                            </a>
                                        </figure>
                                        <div class="inner">
                                            <h6>{{ \Carbon\Carbon::parse($item->published_at)->format('M d, Y') }}</h6>
                                            <h5>
                                                <a href="{{ url('news/' . $item->id) }}">
                                                    {{ \Illuminate\Support\Str::limit($item->title, 50) }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach
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
