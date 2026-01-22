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
                Pelaporan dapat dilakukan secara anonim.
                Identitas pelapor dijamin kerahasiaannya.
            </p>
        </header>

        <hr>

        <form id="wbsForm" enctype="multipart/form-data">

            <section class="report-section">
                <h2>Detail Pelanggaran</h2>

                <div class="form-group">
                    <label>Judul Kasus/Pelanggaran *</label>
                    <input type="text" name="judul_kasus" required>
                </div>

                <div class="form-group">
                    <label>Tipe Insiden *</label>
                    <select name="tipe_insiden" required>
                        <option value="">Pilih tipe insiden</option>
                        <option value="Pelanggaran Etika & Keuangan">
                            Pelanggaran Etika & Keuangan
                        </option>
                        <option value="Pelanggaran HSSE">Pelanggaran HSSE</option>
                        <option value="Penyalahgunaan Wewenang">
                            Penyalahgunaan Wewenang
                        </option>
                        <option value="Lainnya">
                            Lainnya
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kejadian yang Dilaporkan *</label>
                    <textarea name="kejadian" rows="4" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Terlapor</label>
                        <input type="text" name="nama_terlapor">
                    </div>
                    <div class="form-group">
                        <label>Jabatan Terlapor</label>
                        <input type="text" name="jabatan_terlapor">
                    </div>
                </div>

                <div class="form-group">
                    <label>Lokasi Kejadian</label>
                    <input type="text" name="lokasi_kejadian">
                </div>

                <div class="form-group">
                    <label>Tanggal & Waktu Kejadian</label>
                    <input type="datetime-local" name="tanggal_kejadian">
                </div>

                <div class="form-group">
                    <label>Apakah ada saksi mata?</label>
                    <input type="text" name="ada_saksi">
                </div>

                <div class="form-group">
                    <label>Motif (jika diketahui)</label>
                    <input type="text" name="motif">
                </div>

                <div class="form-group">
                    <label>Pernah terjadi sebelumnya?</label>
                    <input type="text" name="pernah_terjadi_sebelumnya">
                </div>

                <div class="form-group">
                    <label>Pelanggaran Peraturan Perusahaan</label>
                    <textarea name="pelanggaran_peraturan" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Dampak terhadap Perusahaan</label>
                    <textarea name="dampak_perusahaan" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Perkiraan Kerugian Finansial</label>
                    <input type="number" name="perkiraan_kerugian" value="0">
                </div>

                <div class="form-group">
                    <label>Apakah telah dilaporkan sebelumnya?</label>
                    <textarea name="pernah_dilaporkan" rows="2"></textarea>
                </div>
            </section>

            <section class="report-section">
                <h2>Pihak Pelapor</h2>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Pelapor</label>
                        <input type="text" name="nama_pelapor">
                    </div>
                    <div class="form-group">
                        <label>Email Pelapor</label>
                        <input type="email" name="email_pelapor">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Kontak</label>
                    <input type="text" name="kontak_pelapor">
                </div>
            </section>

            <section class="report-section">
                <h2>Lampiran</h2>

                <div class="form-group">
                    <label>Dokumen Pendukung</label>
                    <input type="file" name="dokumen_pendukung">
                </div>

                <small class="text-danger">
                    Jika lebih dari satu file, harap dikompres (.zip/.rar)
                </small>
            </section>

            <hr>

            <p class="report-note">
                Setelah laporan dikirim, sistem akan memberikan Nomor Tiket Pelaporan.
            </p>

            <div class="submit-wrapper">
                <button type="submit" id="submitBtn">
                    Submit Report
                </button>
            </div>

        </form>

        <div id="formResponse" style="display:none;margin-top:20px;"></div>

    </div>
</div>

{{-- ================= AJAX SCRIPT ================= --}}
<script>
document.getElementById('wbsForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = this;
    const btn = document.getElementById('submitBtn');
    const responseBox = document.getElementById('formResponse');

    btn.disabled = true;
    btn.innerText = 'Submitting...';

    const formData = new FormData(form);

    try {
        const response = await fetch('{{ url('/api/wbs') }}', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (response.ok) {
            responseBox.style.display = 'block';
            responseBox.innerHTML = `
                <div class="alert-success">
                    <strong>Laporan berhasil dikirim!</strong><br>
                    Nomor Tiket: <b>${result.data.ticket_number}</b>
                </div>
            `;
            form.reset();
        } else {
            throw result;
        }

    } catch (error) {
        responseBox.style.display = 'block';
        responseBox.innerHTML = `
            <div class="alert-error">
                <strong>Gagal mengirim laporan</strong><br>
                ${error.message ?? 'Periksa kembali data yang dikirim'}
            </div>
        `;
    }

    btn.disabled = false;
    btn.innerText = 'Submit Report';
});
</script>
@endsection
