@extends('layouts.admin')

@section('title', 'Admin')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="spec-editor">
        <h1 class="page-title">Products Editor</h1>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="spec-wrapper">
            <div class="spec-header">
                <h2 class="spec-title">Products</h2>
                <a href="{{ route('admin.product.create') }}" class="btn-add">Add New Product</a>
            </div>
            <div class="spec-list">
                @forelse ($products as $product)
                    @php
                        $thumbnails = $product->thumbnail ?? [];
                        $productImage = $thumbnails[0] ?? null;
                    @endphp

                    <div class="spec-card {{ $product->is_top ? 'top-accent' : '' }}">

                        {{-- ACTIONS --}}
                        <div class="card-actions">
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn-edit">Edit</a>

                            <form action="{{ route('admin.product.toggleTop', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @if ($product->is_top)
                                    <button type="submit" class="btn-top-toggle active">Top #{{ $product->sort_order }}</button>
                                @else
                                    <button type="submit" class="btn-top-toggle inactive">Set Top</button>
                                @endif
                            </form>

                            <form action="{{ route('admin.product.delete', $product->id) }}" method="POST"
                                style="display:inline;" onsubmit="return confirm('Yakin mau hapus product ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </div>

                        <div class="spec-field">
                            <span class="label">Product Name</span>
                            <div class="value title">{{ $product->name }}</div>
                        </div>

                        <div class="image-group">
                            <div class="image-group">
                                <img src="{{ $productImage ? route('product.image', $productImage) : 'https://placehold.co/135x135' }}"
                                    alt="Product Image">
                                <img src="{{ $product->spec_image ? route('product.image', $product->spec_image) : 'https://placehold.co/135x135' }}"
                                    alt="Specification Image">
                            </div>
                        </div>

                        <div class="spec-field">
                            <span class="label">Category</span>
                            <div class="value">{{ $product->category }}</div>
                        </div>

                    </div>
                @empty
                    <p style="color:#6b7280;">Belum ada product.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
