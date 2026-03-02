<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WbsReportSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('wbs_reports')->truncate();

        $reports = [
            [
                'ticket_number'              => 'WBS-' . date('Y') . '-0001',
                'judul_kasus'                => 'Dugaan Penyimpangan Proses Pengadaan Barang',
                'tipe_insiden'               => 'Korupsi / Penyuapan',
                'kejadian'                   => 'Pelapor menduga adanya penyimpangan dalam proses tender pengadaan bahan baku baja, di mana salah satu vendor mendapatkan perlakuan istimewa tanpa melalui prosedur seleksi yang transparan.',
                'nama_terlapor'              => 'Anonim',
                'jabatan_terlapor'           => 'Staf Pengadaan',
                'lokasi_kejadian'            => 'Kantor Pusat, Cilegon',
                'tanggal_kejadian'           => '2025-11-15',
                'ada_saksi'                  => 'Ada, namun saksi tidak bersedia disebut namanya',
                'motif'                      => 'Diduga ada kepentingan pribadi dan keuntungan finansial',
                'pernah_terjadi_sebelumnya'  => 'Belum pernah dilaporkan sebelumnya',
                'pelanggaran_peraturan'      => 'Melanggar Pedoman Pengadaan Barang/Jasa Perusahaan dan Kode Etik AKHLAK',
                'dampak_perusahaan'          => 'Kerugian finansial dan reputasi perusahaan',
                'perkiraan_kerugian'         => 'Rp 500.000.000 - Rp 1.000.000.000',
                'pernah_dilaporkan'          => 'Belum pernah',
                'nama_pelapor'              => 'Pelapor Anonim',
                'email_pelapor'             => 'anon.report@example.com',
                'kontak_pelapor'             => '+62 800-0000-0001',
                'dokumen_pendukung'          => null,
            ],
            [
                'ticket_number'              => 'WBS-' . date('Y') . '-0002',
                'judul_kasus'                => 'Dugaan Pelanggaran Keselamatan Kerja di Area Produksi',
                'tipe_insiden'               => 'Pelanggaran K3 / Keselamatan',
                'kejadian'                   => 'Pelapor melaporkan bahwa supervisor di line produksi B memerintahkan pekerja untuk mengabaikan prosedur lock-out tag-out (LOTO) demi mengejar target produksi, sehingga menempatkan pekerja dalam risiko kecelakaan serius.',
                'nama_terlapor'              => 'Anonim',
                'jabatan_terlapor'           => 'Supervisor Produksi',
                'lokasi_kejadian'            => 'Pabrik Produksi – Divisi Rolling Mill',
                'tanggal_kejadian'           => '2025-12-03',
                'ada_saksi'                  => 'Ada beberapa operator yang turut menyaksikan',
                'motif'                      => 'Tekanan target produksi bulanan',
                'pernah_terjadi_sebelumnya'  => 'Pernah terjadi 2 kali sebelumnya namun tidak dilaporkan',
                'pelanggaran_peraturan'      => 'Melanggar UU No. 1/1970 tentang Keselamatan Kerja dan SOP LOTO Perusahaan',
                'dampak_perusahaan'          => 'Risiko kecelakaan fatal, potensi sanksi regulasi dan reputasi',
                'perkiraan_kerugian'         => 'Tidak dapat diperkirakan – risiko jiwa',
                'pernah_dilaporkan'          => 'Belum pernah secara resmi',
                'nama_pelapor'              => 'Pelapor Anonim',
                'email_pelapor'             => 'safety.reporter@example.com',
                'kontak_pelapor'             => '+62 800-0000-0002',
                'dokumen_pendukung'          => null,
            ],
        ];

        foreach ($reports as $report) {
            DB::table('wbs_reports')->insert(array_merge($report, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
