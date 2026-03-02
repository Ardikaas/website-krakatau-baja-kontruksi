<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\WbsReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\WbsReportMail;

class WbsController extends Controller
{
    public function index()
    {
        return ApiResponse::success(
            WbsReport::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_kasus' => 'required|string|max:255',
            'tipe_insiden' => 'required|string|max:100',
            'kejadian' => 'required|string',

            'nama_terlapor' => 'nullable|string|max:255',
            'jabatan_terlapor' => 'nullable|string|max:255',
            'lokasi_kejadian' => 'nullable|string|max:255',
            'tanggal_kejadian' => 'nullable|date',

            'ada_saksi' => 'nullable|string',
            'motif' => 'nullable|string',
            'pernah_terjadi_sebelumnya' => 'nullable|string',

            'pelanggaran_peraturan' => 'nullable|string',
            'dampak_perusahaan' => 'nullable|string',
            'perkiraan_kerugian' => 'nullable|string',
            'pernah_dilaporkan' => 'nullable|string',

            'nama_pelapor' => 'nullable|string|max:255',
            'email_pelapor' => 'nullable|email|max:255',
            'kontak_pelapor' => 'nullable|string|max:50',

            'dokumen_pendukung' => 'nullable|file|mimes:jpg,jpeg,png,pdf,zip,rar|max:10240',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validasi gagal',
                422,
                $validator->errors()
            );
        }

        $ticketNumber = 'ID-LP'
            . now()->format('dmy')
            . rand(10000, 99999);

        $filePath = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $filePath = $request->file('dokumen_pendukung')
                ->store('wbs', 'public');
        }

        $report = WbsReport::create(array_merge(
            $request->except('dokumen_pendukung'),
            [
                'ticket_number' => $ticketNumber,
                'dokumen_pendukung' => $filePath,
            ]
        ));

        Mail::to(env('WBS_ADMIN_EMAIL'))
        ->send(new WbsReportMail([
            'type' => 'admin',
            'ticket' => $ticketNumber,
            'judul' => $report->judul_kasus,
            'tipe' => $report->tipe_insiden,
            'kejadian' => $report->kejadian,
            'nama_terlapor' => $report->nama_terlapor,
            'jabatan_terlapor' => $report->jabatan_terlapor,
            'lokasi' => $report->lokasi_kejadian,
            'tanggal' => $report->tanggal_kejadian,
            'kerugian' => $report->perkiraan_kerugian,
            'nama_pelapor' => $report->nama_pelapor,
            'email_pelapor' => $report->email_pelapor,
            'kontak' => $report->kontak_pelapor,
            'file' => $filePath,
        ]));

        if ($report->email_pelapor) {
        Mail::to($report->email_pelapor)
            ->send(new WbsReportMail([
                'ticket' => $ticketNumber,
                'judul' => $report->judul_kasus,
                'tipe' => $report->tipe_insiden,
                'kejadian' => $report->kejadian,
                'isUser' => true
            ]));
    }

        return ApiResponse::success(
            $report,
            'Laporan WBS berhasil dikirim',
            201
        );
    }

    public function destroy($id)
    {
        $report = WbsReport::find($id);

        if (!$report) {
            return ApiResponse::error(
                'Laporan tidak ditemukan',
                404
            );
        }

        if ($report->dokumen_pendukung) {
            Storage::disk('public')->delete($report->dokumen_pendukung);
        }

        $report->delete();

        return ApiResponse::success(
            null,
            'Laporan berhasil dihapus'
        );
    }
    public function show($id)
    {
        $report = WbsReport::find($id);

        if (!$report) {
            return ApiResponse::error(
                'Laporan WBS tidak ditemukan',
                404
            );
        }

        return ApiResponse::success($report);
    }

    public function downloadEvidence($id)
    {
        $report = WbsReport::find($id);

        if (!$report) {
            return ApiResponse::error(
                'Laporan WBS tidak ditemukan',
                404
            );
        }

        if (!$report->dokumen_pendukung) {
            return ApiResponse::error(
                'Dokumen pendukung tidak tersedia',
                404
            );
        }

        $path = storage_path('app/public/' . $report->dokumen_pendukung);

        if (!file_exists($path)) {
            return ApiResponse::error(
                'File tidak ditemukan',
                404
            );
        }

        return response()->download(
            $path,
            basename($report->dokumen_pendukung)
        );
    }
}
