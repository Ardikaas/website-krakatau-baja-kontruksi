@extends('layouts.admin')

@section('title', 'Admin')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="spec-editor">
        <h1 class="page-title">Products Editor</h1>
        <div class="spec-wrapper">
            <div class="spec-header">
                <h2 class="spec-title">Products</h2>
                <a href="{{ route('admin.product.create') }}" class="btn-add">
                    Add New Product
                </a>
            </div>
            <div class="spec-list">
                @forelse ($products as $product)
                    @php
                        $thumbnails = $product->thumbnail ?? [];
                        $productImage = $thumbnails[0] ?? null;
                    @endphp

                    <div class="spec-card">

                        {{-- ACTIONS --}}
                        <div class="card-actions">
                            <form action="{{ route('admin.product.delete', $product->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus product ini?');">
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
                                <img src="{{ $productImage ? route('admin.product.image', $productImage) : 'https://placehold.co/135x135' }}"
                                    alt="Product Image">

                                <img src="{{ $product->spec_image ? route('admin.product.image', $product->spec_image) : 'https://placehold.co/135x135' }}"
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
