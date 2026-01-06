@extends('layouts.front')

@section('title', 'Whistle Blowing System')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
<x-landingPageSection1 type="hero" title="Produsen|Baja |Berkualitas" />
<div class="whistle-blowing-system">
    <div class="main-container">

        <header class="wbs-header">
            <h1>Form Pelaporan</h1>
            <p>
                Penyampaian pelaporan melalui website/portal yang disediakan
                dapat dilakukan secara anonim (tanpa identitas pelapor)
                dalam rangka menjaga kerahasiaan identitas pelapor.
            </p>
        </header>

        <hr>

        <section class="report-section">
            <h2>Detail Pelanggaran</h2>

            <div class="form-group">
                <label>Judul Kasus/Pelanggaran</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Tipe Insiden</label>
                <select>
                    <option value="">Pilih tipe insiden</option>
                </select>
            </div>

            <div class="form-group">
                <label>Kejadian apa yang ingin dilaporkan?</label>
                <textarea rows="4"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Terlapor</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Jabatan Terlapor</label>
                    <input type="text">
                </div>
            </div>

            <div class="form-group">
                <label>Lokasi Kejadian</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Kapan kejadian terjadi?</label>
                <input type="datetime-local">
            </div>

            <div class="form-group">
                <label>Apakah ada saksi mata?</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Apakah Anda mengetahui motif dari perbuatan tersebut?</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Apakah kejadian ini pernah terjadi sebelumnya?</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>
                    Apakah pelanggaran ini melanggar peraturan perusahaan?
                </label>
                <textarea rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>
                    Apakah pelanggaran ini berdampak pada reputasi/finansial/HSSE?
                </label>
                <textarea rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>Perkiraan jumlah kerugian finansial</label>
                <input type="number" placeholder="Jika belum diketahui isi dengan 0">
                <small class="text-danger">
                    Jika belum diketahui dapat diinput dengan angka 0
                </small>
            </div>

            <div class="form-group">
                <label>Apakah kejadian telah dilaporkan sebelumnya?</label>
                <textarea rows="2"></textarea>
            </div>
        </section>

        <section class="report-section">
            <h2>Pihak Pelapor</h2>
            <p class="section-note">
                Segala informasi terkait pelapor dijamin kerahasiaannya oleh Perusahaan
            </p>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Pelapor</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email">
                </div>
            </div>

            <div class="form-group">
                <label>Nomor Kontak</label>
                <input type="text">
            </div>
        </section>

        <section class="report-section">
            <h2>Lampiran</h2>

            <div class="form-row">
                <div class="form-group upload-box">
                    <label>Dokumen Pendukung</label>
                    <div class="upload-area">
                        <img src="{{ asset('images/icons/img_upload_computer.svg') }}" alt="Upload" class="upload-icon">
                        <p class="upload-text">Drop your image here, or <span class="link-text">Click to browse</span></p>
                        <input type="file">
                    </div>
                </div>

                <div class="form-group">
                    <label>Keterangan Lampiran</label>
                    <input type="text">
                </div>
            </div>

            <small class="text-danger">
                Jika terdapat lampiran lebih dari 1, harap masukkan dalam format .zip/.rar
            </small>
        </section>

        <hr>

        <p class="report-note">
            Saat Anda mengirimkan laporan, Anda akan menerima Nomor Tiket Pelaporan.
            Harap dicatat dan disimpan untuk pengecekan status laporan.
        </p>

        <div class="submit-wrapper">
            <button type="submit">Submit Report</button>
        </div>

    </div>
</div>
@endsection
