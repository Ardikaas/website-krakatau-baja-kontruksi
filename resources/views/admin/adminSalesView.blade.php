@extends('layouts.admin')

@section('title', 'Sales Management')
@section('meta_description', 'Sales Management Admin')

@section('content')
    <div class="admin-landing-page">
        <div class="main-container">
            <div class="content-wrapper">
                <div class="main-area">
                    <main class="main-content">
                        <div class="content-inner">

                            <h1 class="page-title">Sales Management</h1>

                            <!-- SECTION -->
                            <section class="section">

                                <div class="section-header">
                                    <h2 class="section-title">Sales List</h2>

                                    <button class="add-btn" type="button" onclick="openSalesModal()">
                                        <img src="{{ asset('images/icons/img_add_1_streamline_core_line_free.svg') }}"
                                            class="add-icon">
                                        Add Sales
                                    </button>
                                </div>

                                <!-- LIST SALES -->
                                <div class="points-list">

                                    @forelse ($sales as $s)
                                        <article class="point-item">

                                            <div class="point-content">

                                                <!-- FOTO -->
                                                @if ($s->photo)
                                                    <img src="{{ route('sales.image', $s->photo) }}" class="point-icon"
                                                        style="object-fit:cover;">
                                                @else
                                                    <div class="point-icon"
                                                        style="background:#f0f0f0; display:flex; align-items:center; justify-content:center; font-size:24px; color:#666;">
                                                        👤
                                                    </div>
                                                @endif

                                                <!-- TEXT -->
                                                <div class="point-text">
                                                    <h3 class="point-title">
                                                        {{ $s->name }}
                                                    </h3>

                                                    <p class="point-description">
                                                        {{ $s->contact }}
                                                    </p>

                                                    <!-- KATEGORI -->
                                                    @if ($s->categories)
                                                        @php
                                                            $cats = explode(',', $s->categories);
                                                        @endphp

                                                        <p class="point-description">
                                                            @foreach ($cats as $cat)
                                                                <span
                                                                    style="
                                                                background:#e6f7ff;
                                                                color:#00a1d1;
                                                                padding:3px 8px;
                                                                border-radius:6px;
                                                                margin-right:4px;
                                                                font-size:11px;">
                                                                    {{ $cat }}
                                                                </span>
                                                            @endforeach
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- DELETE -->
                                            <div class="point-actions">
                                                <form method="POST" action="{{ route('admin.sales.destroy', $s->id) }}"
                                                    onsubmit="return confirm('Hapus sales ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn-icon">
                                                        <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}"
                                                            class="action-icon">
                                                    </button>
                                                </form>
                                            </div>

                                        </article>
                                    @empty
                                        <p class="info-text">
                                            Belum ada data sales.
                                        </p>
                                    @endforelse

                                </div>
                            </section>

                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>


    <!-- ================= MODAL ADD SALES ================= -->
    <div class="modal-overlay sales-modal" id="salesModal">
        <div class="modal-box">

            <h3 class="modal-title">Add Sales</h3>

            <form action="{{ route('admin.sales.store') }}" method="POST" enctype="multipart/form-data" class="modal-form">

                @csrf

                <!-- FOTO -->
                <div class="form-group">
                    <label>Photo</label>

                    <label class="custom-file-input">
                        <span id="salesFileText">
                            Click to upload image
                        </span>

                        <input type="file" name="photo" accept="image/png,image/jpeg" hidden
                            onchange="handleSalesFile(this)">
                    </label>
                </div>

                <!-- NAMA -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Sales name" required>
                </div>

                <!-- KONTAK -->
                <div class="form-group">
                    <label>Contact</label>
                    <div class="phone-input-container">
                        <span class="phone-prefix">+62</span>
                        <input type="text" name="contact" placeholder="82123456789" required class="phone-input">
                    </div>
                </div>

                <!-- KATEGORI -->
                <div class="form-group">
                    <label>Categories</label>
                    <div class="custom-dropdown" id="categoriesDropdown">
                        <div class="dropdown-selected" onclick="toggleDropdown()">
                            <span id="selectedText">Select categories</span>
                            <span class="dropdown-arrow"></span>
                        </div>
                        <div class="dropdown-options">
                            @foreach ($categories as $cat)
                                <label class="option-item">
                                    <input type="checkbox" class="option-checkbox" value="{{ $cat }}"
                                        onchange="updateSelection()">
                                    {{ $cat }}
                                </label>
                            @endforeach
                        </div>
                        <input type="hidden" name="categories" id="categoriesInput" required>
                    </div>
                    <div class="selected-tags" id="selectedTags"></div>
                </div>

                <!-- BUTTON -->
                <div class="action-buttons">

                    <button type="button" class="cancel-btn" onclick="closeSalesModal()">
                        Cancel
                    </button>

                    <button type="submit" class="save-btn">
                        Save
                    </button>

                </div>

            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        function openSalesModal() {
            document.getElementById('salesModal').style.display = 'flex';
        }

        function closeSalesModal() {
            document.getElementById('salesModal').style.display = 'none';
            // Reset dropdown
            document.getElementById('categoriesDropdown').classList.remove('open');
            updateSelection();
        }

        // Close modal when clicking outside
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('salesModal');
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeSalesModal();
                }
            });
        });

        function handleSalesFile(input) {
            if (!input.files || input.files.length === 0) return;

            const file = input.files[0];
            const text = document.getElementById('salesFileText');

            text.textContent = file.name;
            text.style.color = '#16a34a';
            text.style.fontWeight = '500';
        }

        function toggleDropdown() {
            const dropdown = document.getElementById('categoriesDropdown');
            dropdown.classList.toggle('open');
        }

        function updateSelection() {
            const checkboxes = document.querySelectorAll('#categoriesDropdown .option-checkbox');
            const selected = Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value);
            const selectedText = document.getElementById('selectedText');
            const selectedTags = document.getElementById('selectedTags');
            const hiddenInput = document.getElementById('categoriesInput');

            if (selected.length === 0) {
                selectedText.textContent = 'Select categories';
                selectedTags.innerHTML = '';
                hiddenInput.value = '';
            } else {
                selectedText.textContent = `${selected.length} selected`;
                selectedTags.innerHTML = selected.map(cat =>
                    `<span class="tag">${cat} <span class="tag-remove" onclick="removeTag('${cat}')">×</span></span>`
                ).join('');
                hiddenInput.value = selected.join(',');
            }
        }

        function removeTag(category) {
            const checkbox = document.querySelector(`#categoriesDropdown .option-checkbox[value="${category}"]`);
            if (checkbox) {
                checkbox.checked = false;
                updateSelection();
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('categoriesDropdown');
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('open');
            }
        });
    </script>
@endpush
