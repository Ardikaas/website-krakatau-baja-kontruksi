@extends('layouts.admin')

@section('title', 'Admin News Manager')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="admin-news-page">
        <div class="main-news-add-container">
            <section class="admin-news-add">
                <div class="add-news-header">
                    <h1 class="news-editor-title">News Management</h1>
                </div>
                {{-- BASIC INFO --}}
                <div class="news-editor-card">
                    <label class="news-editor-label">Image</label>
                    <div class="news-editor-upload" style="position: relative" id="uploadContainer">

                        {{-- INPUT FILE ASLI (TAK KELIHATAN) --}}
                        <input type="file" name="image" accept="image/*" class="news-editor-file-input"
                            onchange="previewImage(this)"
                            style="
                                position: absolute;
                                inset: 0;
                                width: 100%;
                                height: 100%;
                                opacity: 0;
                                cursor: pointer;
                                z-index: 5;
                            ">

                        {{-- UI LAMA (TETAP) --}}
                        <div class="news-editor-upload-inner" id="uploadInner">
                            <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload"
                                class="upload-icon">
                            <p class="upload-text" id="uploadText">
                                Drop your image here, or <span class="link-text">Click to browse</span>
                            </p>
                        </div>

                    </div>
                    <p class="news-editor-helper">
                        Upload a hero banner image (1200×600 px). Supported formats: JPG, PNG.
                    </p>
                </div>
                <div class="news-editor-card">
                    {{-- TITLE --}}
                    <div class="news-editor-field">
                        <label class="news-editor-label">Title (Bahasa Indonesia)</label>
                        <input type="text" id="newsTitle" class="news-editor-input" placeholder="Enter news title id">
                    </div>
                    <div class="news-editor-field">
                        <label class="news-editor-label">Title (English)</label>
                        <input type="text" id="newsTitleEn" class="news-editor-input" placeholder="Enter news title en">
                    </div>

                    {{-- AUTHOR --}}
                    <div class="news-editor-field">
                        <label class="news-editor-label">Author</label>
                        <input type="text" id="newsAuthor" class="news-editor-input" placeholder="Enter author name">
                    </div>

                    {{-- TOOLBAR --}}
                    <label class="news-editor-label">Description (Bahasa Indonesia)</label>
                    <div class="news-editor-toolbar">
                        <select onchange="formatBlock(this.value, 'newsEditor')">
                            <option value="">Normal</option>
                            <option value="h1">Heading 1</option>
                            <option value="h2">Heading 2</option>
                            <option value="h3">Heading 3</option>
                        </select>

                        <button type="button" onclick="format('bold', 'newsEditor')"><b>B</b></button>
                        <button type="button" onclick="format('italic', 'newsEditor')"><i>I</i></button>
                        <button type="button" onclick="format('underline', 'newsEditor')"><u>U</u></button>

                    </div>

                    {{-- EDITOR --}}
                    <div id="newsEditor" class="news-editor-content" contenteditable="true"
                        placeholder="Write your news content here...">
                    </div>

                    {{-- TOOLBAR EN --}}
                    <label class="news-editor-label mt-3">Description (English)</label>
                    <div class="news-editor-toolbar">
                        <select onchange="formatBlock(this.value, 'newsEditorEn')">
                            <option value="">Normal</option>
                            <option value="h1">Heading 1</option>
                            <option value="h2">Heading 2</option>
                            <option value="h3">Heading 3</option>
                        </select>

                        <button type="button" onclick="format('bold', 'newsEditorEn')"><b>B</b></button>
                        <button type="button" onclick="format('italic', 'newsEditorEn')"><i>I</i></button>
                        <button type="button" onclick="format('underline', 'newsEditorEn')"><u>U</u></button>

                    </div>

                    {{-- EDITOR EN --}}
                    <div id="newsEditorEn" class="news-editor-content" contenteditable="true"
                        placeholder="Write your news content here in english...">
                    </div>
                </div>
                {{-- ACTION --}}
                <div class="news-editor-actions">
                    <button class="news-editor-btn-cancel">Cancel</button>
                    <button class="news-editor-btn-add" onclick="submitNews()">Add News</button>
                </div>
            </section>
        </div>
    </div>
@endsection
