<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WbsReport extends Model
{
    protected $fillable = [
        'ticket_number',
        'judul_kasus',
        'tipe_insiden',
        'kejadian',
        'nama_terlapor',
        'jabatan_terlapor',
        'lokasi_kejadian',
        'tanggal_kejadian',
        'ada_saksi',
        'motif',
        'pernah_terjadi_sebelumnya',
        'pelanggaran_peraturan',
        'detail_peraturan',
        'dampak_perusahaan',
        'detail_dampak',
        'perkiraan_kerugian',
        'pernah_dilaporkan',
        'detail_pelaporan_sebelumnya',
        'nama_pelapor',
        'email_pelapor',
        'kontak_pelapor',
        'dokumen_pendukung',
    ];

    protected $casts = [
        'ada_saksi' => 'boolean',
        'pernah_terjadi_sebelumnya' => 'boolean',
        'pelanggaran_peraturan' => 'boolean',
        'dampak_perusahaan' => 'boolean',
        'pernah_dilaporkan' => 'boolean',
        'tanggal_kejadian' => 'date',
    ];
}
