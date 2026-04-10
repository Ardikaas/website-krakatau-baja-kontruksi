@extends('layouts.front')

@section('title', 'Whistle Blowing System')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
<x-landingPageSection1 type="hero" title="Produsen|Baja |Berkualitas" />

<div class="whistle-blowing-system">
    <div class="main-container">

        <header class="wbs-header">
            <h1>{{ __('messages.wbs_title') }}</h1>
            <p>
                {{ __('messages.wbs_desc') }}
            </p>
        </header>

        <hr>

        <form id="wbsForm" enctype="multipart/form-data">

            <section class="report-section">
                <h2>{{ __('messages.wbs_detail_pelanggaran') }}</h2>

                <div class="form-group">
                    <label>{{ __('messages.wbs_judul_kasus') }}</label>
                    <input type="text" name="judul_kasus" required>
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_tipe_insiden') }}</label>
                    <select name="tipe_insiden" required>
                        <option value="">{{ __('messages.wbs_pilih_tipe') }}</option>
                        <option value="Pelanggaran Etika & Keuangan">
                            {{ __('messages.wbs_etika_keuangan') }}
                        </option>
                        <option value="Pelanggaran HSSE">{{ __('messages.wbs_hsse') }}</option>
                        <option value="Penyalahgunaan Wewenang">
                            {{ __('messages.wbs_wewenang') }}
                        </option>
                        <option value="Lainnya">
                            {{ __('messages.wbs_lainnya') }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_kejadian') }}</label>
                    <textarea name="kejadian" rows="4" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>{{ __('messages.wbs_nama_terlapor') }}</label>
                        <input type="text" name="nama_terlapor">
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.wbs_jabatan_terlapor') }}</label>
                        <input type="text" name="jabatan_terlapor">
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_lokasi') }}</label>
                    <input type="text" name="lokasi_kejadian">
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_tanggal') }}</label>
                    <input type="datetime-local" name="tanggal_kejadian">
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_saksi') }}</label>
                    <input type="text" name="ada_saksi">
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_motif') }}</label>
                    <input type="text" name="motif">
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_pernah_terjadi') }}</label>
                    <input type="text" name="pernah_terjadi_sebelumnya">
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_pelanggaran_peraturan') }}</label>
                    <textarea name="pelanggaran_peraturan" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_dampak') }}</label>
                    <textarea name="dampak_perusahaan" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_kerugian') }}</label>
                    <input type="number" name="perkiraan_kerugian" value="0">
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_pernah_dilaporkan') }}</label>
                    <textarea name="pernah_dilaporkan" rows="2"></textarea>
                </div>
            </section>

            <section class="report-section">
                <h2>{{ __('messages.wbs_pihak_pelapor') }}</h2>

                <div class="form-row">
                    <div class="form-group">
                        <label>{{ __('messages.wbs_nama_pelapor') }}</label>
                        <input type="text" name="nama_pelapor">
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.wbs_email_pelapor') }}</label>
                        <input type="email" name="email_pelapor">
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('messages.wbs_kontak_pelapor') }}</label>
                    <input type="text" name="kontak_pelapor">
                </div>
            </section>

            <section class="report-section">
                <h2>{{ __('messages.wbs_lampiran') }}</h2>

                <div class="form-group">
                    <label>{{ __('messages.wbs_dokumen') }}</label>
                    <input type="file" name="dokumen_pendukung">
                </div>

                <small class="text-danger">
                    {{ __('messages.wbs_kompres') }}
                </small>
            </section>

            <hr>

            <p class="report-note">
                {{ __('messages.wbs_note') }}
            </p>

            <div class="submit-wrapper">
                <button type="submit" id="submitBtn">
                    {{ __('messages.wbs_submit') }}
                </button>
            </div>

        </form>

        <div id="formResponse" style="display:none;margin-top:20px;"></div>

    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('wbsForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = this;
    const btn = document.getElementById('submitBtn');
    
    // Simpan text default
    const originalText = btn.innerHTML;

    btn.disabled = true;
    btn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> {{ __('messages.wbs_submitting') }}...`;

    const formData = new FormData(form);

    try {
        const response = await fetch('{{ url('/api/wbs') }}', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (response.ok) {
            Swal.fire({
                title: '{{ __('messages.wbs_success') }}',
                html: `{{ __('messages.wbs_ticket') }} <b>${result.data.ticket_number}</b><br><br>Laporan Anda berhasil dikirim!`,
                icon: 'success',
                confirmButtonColor: '#0056b3',
                confirmButtonText: 'OK'
            });
            form.reset();
        } else {
            throw result;
        }

    } catch (error) {
        Swal.fire({
            title: '{{ __('messages.wbs_failed') }}',
            text: error.message ?? '{{ __('messages.wbs_check_data') }}',
            icon: 'error',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Tutup'
        });
    }

    btn.disabled = false;
    btn.innerHTML = originalText;
});
</script>
@endpush
@endsection
