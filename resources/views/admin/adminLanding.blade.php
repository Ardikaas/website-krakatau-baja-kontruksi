@extends('layouts.admin')

@section('title', 'Admin')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="admin-landing-page">
        <div class="main-container">
            <div class="content-wrapper">
                <div class="main-area">
                    <main class="main-content">
                        <div class="content-inner">
                            <h1 class="page-title">Landing Page Editor</h1>

                            <!-- Hero Banner Section -->
                            <section class="section">
                                <h2 class="section-title">Hero Banner</h2>

                                {{-- LIST HERO BANNER --}}
                                <div class="hero-banner-list">
                                    @forelse ($banners as $banner)
                                        <div class="hero-banner-item">
                                            <div class="hero-banner-info">
                                                <a href="{{ route('admin.hero-banners.view', basename($banner->image)) }}"
                                                    target="_blank" class="hero-banner-link">
                                                    {{ basename($banner->image) }}
                                                </a>
                                            </div>

                                            <form method="POST"
                                                action="{{ route('admin.hero-banners.destroy', $banner->id) }}"
                                                >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="cancel-btn">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @empty
                                        <p class="info-text">Belum ada hero banner.</p>
                                    @endforelse
                                </div>

                                {{-- UPLOAD (HANYA JIKA < 3) --}}
                                @if ($bannerCount < 3)
                                    <form action="{{ route('admin.hero-banners.store') }}" method="POST"
                                        enctype="multipart/form-data" id="heroBannerForm">
                                        @csrf

                                        <label class="upload-zone">
                                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}"
                                                class="upload-icon">

                                            <p class="upload-text" id="heroUploadText">
                                                Drop your image here, or
                                                <span class="link-text">Click to browse</span>
                                            </p>

                                            <input type="file" name="image" accept="image/png,image/jpeg" hidden
                                                required onchange="handleHeroBannerChange(this)">
                                        </label>

                                        <div class="form-group" style="margin-top: 15px;">
                                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Banner Title (Optional)</label>
                                            <input type="text" name="title" placeholder="e.g. Produsen|Baja |Berkualitas" style="width: 100%; border: 1px solid #d1d5db; border-radius: 6px; padding: 10px 14px; margin-bottom: 10px;">
                                            <small style="color: #6b7280; display: block; margin-bottom: 15px;">Gunakan karakter | untuk memberikan line break. Kosongkan untuk pakai teks default.</small>

                                            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Banner Description (Optional)</label>
                                            <textarea name="description" placeholder="Default text..." style="width: 100%; border: 1px solid #d1d5db; border-radius: 6px; padding: 10px 14px; min-height: 80px;"></textarea>
                                        </div>

                                        <div class="section-footer">
                                            <div class="info-row">
                                                <img src="{{ asset('images/icons/img_information_circle.svg') }}"
                                                    class="info-icon">
                                                <div>
                                                    <p class="info-text">
                                                        Upload a hero banner image (1920×730 px).
                                                    </p>
                                                    <p class="info-text">
                                                        Supported formats: JPG, PNG.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="action-buttons">
                                                <button type="submit" class="save-btn" id="heroSaveBtn" disabled>
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <p class="info-text" style="color:#ff3131;">
                                        Maksimal 3 hero banner. Hapus salah satu untuk menambah.
                                    </p>
                                @endif
                            </section>

                            <div class="modal-overlay" id="whyChooseUsModal">
                                <div class="modal-box">
                                    <h3 class="modal-title">Add Why Choose Us Point</h3>

                                    <form action="{{ route('admin.why-choose-us.store') }}" method="POST"
                                        enctype="multipart/form-data" class="modal-form">
                                        @csrf

                                        <div class="form-group">
                                            <label>Icon Image</label>

                                            <label class="custom-file-input">
                                                <span id="whyChooseUsFileText">Click to upload image</span>
                                                <input type="file" name="image" accept="image/png,image/jpeg"
                                                    onchange="handleWhyChooseUsFile(this)" hidden>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>Title (ID)</label>
                                            <input type="text" name="title" placeholder="e.g. Industri"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Title (EN)</label>
                                            <input type="text" name="title_en" placeholder="e.g. Industry Expertise">
                                        </div>

                                        <div class="form-group">
                                            <label>Description (ID)</label>
                                            <textarea name="description" placeholder="Deskripsi Singkat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Description (EN)</label>
                                            <textarea name="description_en" placeholder="Short description"></textarea>
                                        </div>

                                        <div class="action-buttons">
                                            <button type="button" class="cancel-btn" onclick="closeWhyChooseUsModal()">
                                                Cancel
                                            </button>

                                            <button type="submit" class="save-btn">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Why Choose Us Points Section -->
                            <section class="section">
                                <div class="section-header">
                                    <h2 class="section-title">Why Choose Us Points</h2>

                                    @if ($whyChooseUsCount < 6)
                                        <button class="add-btn" type="button" onclick="openWhyChooseUsModal()">
                                            <img src="{{ asset('images/icons/img_add_1_streamline_core_line_free.svg') }}"
                                                alt="Add" class="add-icon">
                                            Add New Point
                                        </button>
                                    @else
                                        <p class="info-text" style="color:#ff3131;">
                                            Maksimal 6 poin. Hapus salah satu untuk menambah.
                                        </p>
                                    @endif
                                </div>

                                <div class="points-list">
                                    @forelse ($whyChooseUs as $item)
                                        <article class="point-item">
                                            <div class="point-content">
                                                <a href="{{ route('admin.why-choose-us.view', basename($item->image)) }}"
                                                    target="_blank">
                                                    <img src="{{ route('admin.why-choose-us.view', basename($item->image)) }}"
                                                        alt="{{ $item->title }}" class="point-icon">
                                                </a>

                                                <div class="point-text">
                                                    <h3 class="point-title">{{ $item->title }}</h3>
                                                    <p class="point-description">{{ $item->description }}</p>
                                                </div>
                                            </div>

                                            <div class="point-actions">
                                                <form method="POST"
                                                    action="{{ route('admin.why-choose-us.destroy', $item->id) }}"
                                                    onsubmit="return confirm('Hapus point ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn-icon">
                                                        <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}"
                                                            alt="Delete" class="action-icon">
                                                    </button>
                                                </form>
                                            </div>
                                        </article>
                                    @empty
                                        <p class="info-text">Belum ada data Why Choose Us.</p>
                                    @endforelse
                                </div>
                            </section>


                            <!-- Downloadable Resources Section -->
                            <section class="resources-section">
                                <h2 class="section-title">Downloadable Resources</h2>

                                <div class="resources-content">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label style="display: block; margin-bottom: 8px; font-weight: 500;">Document Title (English/Optional)</label>
                                        <input type="text" id="pdfTitleEn" class="form-control" placeholder="e.g. Company Profile 2024" style="width: 100%; border: 1px solid #d1d5db; border-radius: 6px; padding: 10px 14px;">
                                    </div>
                                    <div class="file-upload" tabindex="0" role="button">
                                        <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload"
                                            class="upload-icon">

                                        <p class="upload-text" id="uploadText">
                                            Drop your file here, or
                                            <label class="upload-browse">
                                                Click to browse
                                                <input type="file" id="pdfFile" name="file"
                                                    accept="application/pdf" class="file-input-hidden"
                                                    onchange="handlePdfUpload(this)">
                                            </label>
                                        </p>
                                    </div>

                                    @if ($documents->count())
                                        <div class="file-list">
                                            @foreach ($documents as $doc)
                                                <div class="file-item">
                                                    <span class="file-name">
                                                        <a href="{{ route('admin.documents.download', $doc->id) }}" target="_blank">
                                                            {{ $doc->title }}
                                                        </a>
                                                    </span>

                                                    <form action="{{ url('/admin/documents/' . $doc->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn-icon">
                                                            <img src="{{ asset('images/icons/img_recycle_bin_2_streamline.svg') }}"
                                                                alt="Delete" class="delete-icon">
                                                        </button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="section-footer">
                                    <div class="info-section">
                                        <div class="info-row">
                                            <img src="{{ asset('images/icons/img_information_circle.svg') }}"
                                                alt="Info" class="info-icon">
                                            <div>
                                                <p class="info-text">Upload a downloadable resources.</p>
                                                <p class="info-text">Supported formats: PDF.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="action-buttons">
                                        <button class="cancel-btn" type="button">Cancel</button>

                                        <button class="save-btn" type="button" onclick="uploadDocument()">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let selectedPdfFile = null;

        function handlePdfUpload(input) {
            if (!input.files || input.files.length === 0) return;

            const file = input.files[0];

            if (file.type !== 'application/pdf') {
                alert('Hanya file PDF yang diperbolehkan');
                input.value = '';
                selectedPdfFile = null;
                return;
            }

            selectedPdfFile = file;

            const uploadText = document.getElementById('uploadText');
            uploadText.querySelector('.file-name')?.remove();

            const info = document.createElement('span');
            info.className = 'file-name';
            info.style.marginLeft = '8px';
            info.style.color = '#16a34a';
            info.textContent = `✓ ${file.name}`;

            uploadText.appendChild(info);
        }

        function uploadDocument() {
            if (!selectedPdfFile) {
                alert('Pilih file PDF terlebih dahulu');
                return;
            }

            const titleEn = document.getElementById('pdfTitleEn').value;

            const formData = new FormData();
            formData.append('file', selectedPdfFile);
            if (titleEn) {
                formData.append('title_en', titleEn);
            }

            fetch("{{ route('admin.documents.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    location.reload();
                })
                .catch(() => {
                    alert('Upload gagal');
                });
        }

        function handleHeroBannerChange(input) {
            if (!input.files || input.files.length === 0) return;

            const file = input.files[0];

            if (!file.type.startsWith('image/')) {
                alert('Hanya file gambar yang diperbolehkan');
                input.value = '';
                return;
            }

            const text = document.getElementById('heroUploadText');
            const saveBtn = document.getElementById('heroSaveBtn');

            text.innerHTML = `
            <span style="color:#16a34a; font-weight:500;">
                ✓ ${file.name}
            </span>
        `;

            saveBtn.disabled = false;
            saveBtn.style.backgroundColor = '#00a1d1';
        }

        function openWhyChooseUsModal() {
            document.getElementById('whyChooseUsModal').style.display = 'flex';
        }

        function closeWhyChooseUsModal() {
            document.getElementById('whyChooseUsModal').style.display = 'none';
        }

        function handleWhyChooseUsFile(input) {
            if (!input.files || input.files.length === 0) return;

            const file = input.files[0];
            const text = document.getElementById('whyChooseUsFileText');

            text.textContent = file.name;
            text.style.color = '#16a34a';
            text.style.fontWeight = '500';
        }
    </script>
@endpush
