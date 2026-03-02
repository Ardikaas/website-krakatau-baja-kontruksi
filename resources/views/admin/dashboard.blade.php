@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@push('styles')
    @vite(['resources/css/adminDashboard.css'])
@endpush

@section('content')
    <div class="admin-dashboard">
        <div class="main-container">
            <section class="dashboard-content">

                <div class="dashboard-header">
                    <h1 class="dashboard-title">Dashboard</h1>
                    <div class="dashboard-actions">
                        <a href="{{ route('admin.logout') }}" class="btn-logout"
                            onclick="return confirm('Are you sure you want to logout?')">
                            <i class="icon-logout"></i>
                            Logout
                        </a>
                    </div>
                </div>

                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="icon-project"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">{{ $projectsCount ?? 0 }}</h3>
                            <p class="stat-label">Total Projects</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="icon-news"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">{{ $newsCount ?? 0 }}</h3>
                            <p class="stat-label">News Articles</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="icon-document"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">{{ $documentsCount ?? 0 }}</h3>
                            <p class="stat-label">Documents</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="icon-user"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">{{ $usersCount ?? 0 }}</h3>
                            <p class="stat-label">Users</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-quick-actions">
                    <h2 class="section-title">Quick Actions</h2>
                    <div class="actions-grid">
                        <a href="{{ route('admin.projects.index') }}" class="action-card">
                            <div class="action-icon">
                                <i class="icon-project"></i>
                            </div>
                            <div class="action-content">
                                <h3>Manage Projects</h3>
                                <p>Add, edit, or delete projects</p>
                            </div>
                        </a>

                        <a href="{{ route('admin.news.index') }}" class="action-card">
                            <div class="action-icon">
                                <i class="icon-news"></i>
                            </div>
                            <div class="action-content">
                                <h3>Manage News</h3>
                                <p>Create and manage news articles</p>
                            </div>
                        </a>

                        <a href="{{ route('admin.documents.index') }}" class="action-card">
                            <div class="action-icon">
                                <i class="icon-document"></i>
                            </div>
                            <div class="action-content">
                                <h3>Manage Documents</h3>
                                <p>Upload and organize documents</p>
                            </div>
                        </a>

                        <a href="{{ route('admin.products.index') }}" class="action-card">
                            <div class="action-icon">
                                <i class="icon-product"></i>
                            </div>
                            <div class="action-content">
                                <h3>Manage Products</h3>
                                <p>Update product information</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="dashboard-recent-activity">
                    <h2 class="section-title">Recent Activity</h2>
                    <div class="activity-list">
                        @if (isset($recentProjects) && $recentProjects->count() > 0)
                            @foreach ($recentProjects as $project)
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="icon-project"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p><strong>{{ $project->title }}</strong> was
                                            {{ $project->wasRecentlyCreated ? 'created' : 'updated' }}</p>
                                        <span class="activity-time">{{ $project->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="activity-empty">
                                <p>No recent activity</p>
                            </div>
                        @endif
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection
