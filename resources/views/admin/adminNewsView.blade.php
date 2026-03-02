@extends('layouts.admin')

@section('title', 'Admin News Manager')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="admin-news-page">
        <div class="main-container">
            <section class="admin-news-management">

                <div class="anm-header">
                    <h2 class="anm-page-title">News Management</h2>
                </div>

                <div class="anm-grid">
                    <div class="anm-grid-header">
                        <h5 class="anm-grid-title">News</h5>

                        <a href="{{ route('admin.adminNewsAdd') }}" class="anm-add-btn">
                            <span class="anm-add-icon">+</span>
                            Add News
                        </a>
                    </div>

                    <div class="anm-card-grid">
                        @if (isset($news) && $news->count())
                            @foreach ($news as $item)
                                <div class="anm-card">
                                    <p class="anm-card-label">Title</p>

                                    <h3 class="anm-card-title">
                                        {{ $item->title }}
                                    </h3>

                                    <div class="anm-card-image-wrapper">
                                        <img src="{{ asset($item->image_url) }}" class="anm-card-image"
                                            alt="{{ $item->title }}">
                                    </div>

                                    <div class="anm-card-content">
                                        <div class="anm-card-footer">
                                            <div class="anm-author">
                                                <span class="anm-author-name">
                                                    {{ $item->author }}
                                                </span>
                                            </div>
                                            <div class="anm-card-meta">
                                                <span class="anm-date">
                                                    {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                                                </span>

                                                <form action="{{ route('admin.news.delete', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus news ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="anm-delete-btn">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 3; $i++)
                                <div class="anm-card">
                                    <p class="anm-card-label">Title</p>

                                    <h3 class="anm-card-title">
                                        Metal Finishing Techniques: An In-Depth Practical Guide
                                    </h3>

                                    <div class="anm-card-image-wrapper"><img
                                            src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b"
                                            class="anm-card-image" alt="news"></div>

                                    <div class="anm-card-content">

                                        <div class="anm-card-footer">
                                            <div class="anm-author">
                                                <span class="anm-author-name">Alexander W.</span>
                                            </div>
                                            <span class="anm-date">12 Aug 2025</span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
<script>
    console.log('IMAGE URL:', @json($item->image_url));
</script>
