@extends('layouts.admin')

@section('title', 'Admin')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="spec-editor">
        <h1 class="page-title">Products Editor</h1>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- ===== TOP PRODUCTS SECTION ===== --}}
        @php $topProducts = $products->where('is_top', true)->sortBy('sort_order'); @endphp
        @if ($topProducts->count() > 0)
            <div class="spec-wrapper top-products-wrapper">
                <div class="spec-header">
                    <h2 class="spec-title">⭐ Top Products <span class="spec-title-hint">(Drag untuk atur urutan)</span></h2>
                </div>
                <div class="spec-list" id="sortable-top-products">
                    @foreach ($topProducts as $product)
                        @php
                            $thumbnails = $product->thumbnail ?? [];
                            $productImage = $thumbnails[0] ?? null;
                        @endphp

                        <div class="spec-card is-top top-product-card" data-id="{{ $product->id }}" draggable="true">
                            {{-- TOP BADGE --}}
                            <div class="top-badge">
                                ⭐ TOP #{{ $loop->iteration }}
                            </div>

                            {{-- DRAG HANDLE --}}
                            <div class="drag-handle" title="Drag untuk atur urutan">☰</div>

                            {{-- ACTIONS --}}
                            <div class="card-actions-row">
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.product.toggleTop', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-remove-top" title="Hapus dari Top Product">
                                        ✕ Hapus dari Top
                                    </button>
                                </form>
                            </div>

                            <div class="spec-field" style="margin-top: 28px;">
                                <span class="label">Product Name</span>
                                <div class="value title">{{ $product->name }}</div>
                            </div>

                            <div class="image-group">
                                <div class="image-group">
                                    <img src="{{ $productImage ? route('product.image', $productImage) : 'https://placehold.co/135x135' }}"
                                        alt="Product Image">
                                </div>
                            </div>

                            <div class="spec-field">
                                <span class="label">Category</span>
                                <div class="value">{{ $product->category }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- ===== ALL PRODUCTS SECTION ===== --}}
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

                    <div class="spec-card {{ $product->is_top ? 'top-accent' : '' }}">

                        {{-- ACTIONS --}}
                        <div class="card-actions-row">
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn-edit">Edit</a>

                            {{-- TOGGLE TOP --}}
                            <form action="{{ route('admin.product.toggleTop', $product->id) }}" method="POST">
                                @csrf
                                @if ($product->is_top)
                                    <button type="submit" class="btn-top-toggle active">
                                        ⭐ Top
                                    </button>
                                @else
                                    <button type="submit" class="btn-top-toggle inactive" title="Jadikan Top Product">
                                        ☆ Set Top
                                    </button>
                                @endif
                            </form>

                            {{-- DELETE --}}
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

    {{-- DRAG & DROP SCRIPT FOR TOP PRODUCTS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sortable = document.getElementById('sortable-top-products');
            if (!sortable) return;

            let dragItem = null;

            sortable.querySelectorAll('.top-product-card').forEach(card => {
                card.addEventListener('dragstart', function (e) {
                    dragItem = this;
                    this.style.opacity = '0.5';
                    e.dataTransfer.effectAllowed = 'move';
                });

                card.addEventListener('dragend', function () {
                    this.style.opacity = '1';
                    dragItem = null;
                    sortable.querySelectorAll('.top-product-card').forEach(c => {
                        c.style.borderTop = '';
                    });
                });

                card.addEventListener('dragover', function (e) {
                    e.preventDefault();
                    e.dataTransfer.dropEffect = 'move';
                    sortable.querySelectorAll('.top-product-card').forEach(c => {
                        c.style.borderTop = '';
                    });
                    if (this !== dragItem) {
                        this.style.borderTop = '3px solid var(--color-00a1d1, #00a1d1)';
                    }
                });

                card.addEventListener('drop', function (e) {
                    e.preventDefault();
                    if (this !== dragItem) {
                        const allCards = [...sortable.querySelectorAll('.top-product-card')];
                        const fromIndex = allCards.indexOf(dragItem);
                        const toIndex = allCards.indexOf(this);

                        if (fromIndex < toIndex) {
                            this.parentNode.insertBefore(dragItem, this.nextSibling);
                        } else {
                            this.parentNode.insertBefore(dragItem, this);
                        }

                        // Save new order via AJAX
                        const newOrder = [...sortable.querySelectorAll('.top-product-card')].map(c => c.dataset.id);

                        fetch('{{ route("admin.product.updateOrder") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ order: newOrder }),
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                // Update badge numbers
                                sortable.querySelectorAll('.top-product-card').forEach((c, i) => {
                                    const badge = c.querySelector('.top-badge');
                                    if (badge) {
                                        badge.textContent = '⭐ TOP #' + (i + 1);
                                    }
                                });
                            }
                        })
                        .catch(err => console.error('Gagal menyimpan urutan:', err));
                    }
                    this.style.borderTop = '';
                });
            });
        });
    </script>
@endsection
