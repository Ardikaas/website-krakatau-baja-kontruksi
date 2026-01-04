@extends('layouts.admin')

@section('title', 'Admin News Manager')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
<div class="admin-news-page">
    <div class="main-news-add-container">
        <section class="admin-news-add">
            <div class="add-news-header"><h1 class="news-editor-title">News Management</h1></div>
            {{-- BASIC INFO --}}
            <div class="news-editor-card">
                <label class="news-editor-label">Image</label>
                <div class="news-editor-upload">
                    <div class="news-editor-upload-inner">
                        <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                        <p class="upload-text">Drop your image here, or <span class="link-text">Click to browse</span></p>
                    </div>
                </div>
                <p class="news-editor-helper">
                    Upload a hero banner image (1200×600 px). Supported formats: JPG, PNG.
                </p>
            </div>
            <div class="news-editor-card">
                <label class="news-editor-label">Basic Info</label>

                {{-- TOOLBAR --}}
                <div class="news-editor-toolbar">
                    <select onchange="formatBlock(this.value)">
                        <option value="">Normal</option>
                        <option value="h1">Heading 1</option>
                        <option value="h2">Heading 2</option>
                        <option value="h3">Heading 3</option>
                    </select>

                    <button type="button" onclick="format('bold')"><b>B</b></button>
                    <button type="button" onclick="format('italic')"><i>I</i></button>
                    <button type="button" onclick="format('underline')"><u>U</u></button>

                    <button type="button" onclick="format('insertUnorderedList')">bullet list</button>
                    <button type="button" onclick="format('insertOrderedList')">number lis</button>
                </div>

                {{-- EDITOR --}}
                <div
                    class="news-editor-content"
                    contenteditable="true"
                    placeholder="Write your news content here..."
                ></div>
            </div>
            {{-- ACTION --}}
            <div class="news-editor-actions">
                <button class="news-editor-btn-cancel">Cancel</button>
                <button class="news-editor-btn-add">Add News</button>
            </div>
        </section>     
    </div>
</div>
@endsection