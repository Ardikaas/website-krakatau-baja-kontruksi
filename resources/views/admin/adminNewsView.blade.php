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
                    @for ($i = 0; $i < 6; $i++)
                        <div class="anm-card">
                            <p class="anm-card-label">Title</p>

                            <h3 class="anm-card-title">
                                Metal Finishing Techniques: An In-Depth Practical Guide
                            </h3>

                            <div class="anm-card-image-wrapper"><img
                                src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b"
                                class="anm-card-image"
                                alt="news"
                            ></div>

                            <div class="anm-card-content">
                                <p class="anm-category-label">Category</p>

                                <h4 class="anm-card-category">
                                    This is Category
                                </h4>

                                <div class="anm-card-footer">
                                    <div class="anm-author">
                                        <img src="https://i.pravatar.cc/24" class="anm-author-avatar">
                                        <span class="anm-author-name">Alexander W.</span>
                                    </div>

                                    <span class="anm-date">12 Aug 2025</span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
</div>
@endsection