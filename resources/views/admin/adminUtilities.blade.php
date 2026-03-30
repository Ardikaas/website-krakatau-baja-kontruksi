@extends('layouts.admin')

@section('title', 'System Utilities')

@push('styles')
    @vite(['resources/css/adminProjectView.css'])
@endpush

@section('content')
    <div class="admin-project-management">
        <div class="main-container">
            <section class="admin-project-management-utilities">

                <div class="apm-header">
                    <h2 class="apm-page-title">System Utilities</h2>
                </div>

                @if (session('success'))
                    <div
                        style="background-color: #f0fdf4; color: #166534; padding: 16px; border-radius: 8px; border-left: 4px solid #16a34a; margin-bottom: 30px; font-size: 14px; font-family: 'Inter', sans-serif;">
                        <i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i>
                        {!! nl2br(e(session('success'))) !!}
                    </div>
                @endif

                @if (session('error'))
                    <div
                        style="background-color: #fef2f2; color: #991b1b; padding: 16px; border-radius: 8px; border-left: 4px solid #dc2626; margin-bottom: 30px; font-size: 14px; font-family: 'Inter', sans-serif;">
                        <i class="fa-solid fa-circle-xmark" style="margin-right: 8px;"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <div class="apm-grid">
                    <div class="apm-grid-header">
                        <h5 class="apm-grid-title">Maintenance Actions</h5>
                    </div>

                    <div class="apm-card-grid">
                        <!-- Cache Management -->
                        <div class="apm-card" style="padding: 24px; cursor: default;">
                            <div style="margin-bottom: 20px;">
                                <i class="fa-solid fa-broom"
                                    style="font-size: 24px; color: var(--color-00a1d1); margin-bottom: 16px; display: block;"></i>
                                <h3 class="apm-card-title">Cache Management</h3>
                                <p class="apm-card-client" style="min-height: 40px;">Clear application cache, routes, and
                                    config to apply recent updates.</p>
                            </div>

                            <form action="{{ route('admin.utilities.run', 'optimize-clear') }}" method="POST">
                                @csrf
                                <button type="submit" class="apm-add-btn" style="width: 100%; justify-content: center;">
                                    Run Optimize Clear
                                </button>
                            </form>
                        </div>

                        <!-- Database Migration -->
                        <div class="apm-card" style="padding: 24px; cursor: default;">
                            <div style="margin-bottom: 20px;">
                                <i class="fa-solid fa-database"
                                    style="font-size: 24px; color: #16a34a; margin-bottom: 16px; display: block;"></i>
                                <h3 class="apm-card-title">Database Migration</h3>
                                <p class="apm-card-client" style="min-height: 40px;">Execute pending database schema changes
                                    safely from the dashboard.</p>
                            </div>

                            <form action="{{ route('admin.utilities.run', 'migrate') }}" method="POST"
                                onsubmit="return confirm('Run database migrations?')">
                                @csrf
                                <button type="submit" class="apm-add-btn"
                                    style="width: 100%; justify-content: center; background-color: #16a34a;">
                                    Run Migration
                                </button>
                            </form>
                        </div>

                        <!-- Storage Link -->
                        <div class="apm-card" style="padding: 24px; cursor: default;">
                            <div style="margin-bottom: 20px;">
                                <i class="fa-solid fa-link"
                                    style="font-size: 24px; color: #0ea5e9; margin-bottom: 16px; display: block;"></i>
                                <h3 class="apm-card-title">Storage Link</h3>
                                <p class="apm-card-client" style="min-height: 40px;">Fix missing images by regenerating the
                                    symbolic link to the public folder.</p>
                            </div>

                            <form action="{{ route('admin.utilities.run', 'storage-link') }}" method="POST">
                                @csrf
                                <button type="submit" class="apm-add-btn"
                                    style="width: 100%; justify-content: center; background-color: #0ea5e9;">
                                    Generate Link
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div
                    style="margin-top: 40px; padding: 20px; background-color: #fffbeb; border: 1px solid #fde68a; border-radius: 8px; display: flex; align-items: flex-start; gap: 12px; font-family: 'Inter', sans-serif;">
                    <i class="fa-solid fa-triangle-exclamation" style="color: #d97706; margin-top: 3px;"></i>
                    <p style="color: #92400e; font-size: 13px; margin: 0; line-height: 1.5;">
                        <strong>Security Warning:</strong> Access to these utilities is strictly limited to authenticated
                        administrators and only functional when <code>APP_DEBUG</code> is enabled.
                    </p>
                </div>

            </section>
        </div>
    </div>
@endsection
