@extends('layouts.admin')

@section('title', 'Admin - News Management')
@section('meta_description', 'Admin News Management')

@section('content')
<div class="admin-page">
    <div class="admin-layout">

        {{-- SIDEBAR --}}
        @include('components.adminSideBar')

        <div class="admin-main">

            {{-- TOPBAR --}}
            @include('components.adminTopBar')

            {{-- MAIN CONTENT --}}
            <div class="admin-content">

                {{-- NEWS MANAGEMENT START --}}
                <section class="admin-news-management">

                    <div class="anm-header">
                        <h2 class="anm-page-title">News Management</h2>
                    </div>

                    <div class="anm-grid">
                        <div class="anm-grid-header">
                            <h5 class="anm-grid-title">News</h5>

                            <button class="anm-add-btn" id="btnAddNews">
                                <span class="anm-add-icon">+</span>
                                Add News
                            </button>
                        </div>

                        <div class="anm-card-grid">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="anm-card">
                                    <p class="anm-card-label">Title</p>

                                    <h3 class="anm-card-title">
                                        Metal Finishing Techniques: An In-Depth Practical Guide
                                    </h3>

                                    <img
                                        src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b"
                                        class="anm-card-image"
                                        alt="news"
                                    >

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
                {{-- NEWS MANAGEMENT END --}}

            </div>
        </div>

    </div>
</div>
@endsection
