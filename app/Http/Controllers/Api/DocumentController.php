<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\Document;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index(DocumentService $service)
    {
        return ApiResponse::success(
            Document::latest()->get()
        );
    }

    public function store(Request $request, DocumentService $service)
    {
        if (Document::count() >= 2) {
            return ApiResponse::error(
                'Dokumen maksimal 2 item',
                422
            );
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validasi gagal',
                422,
                $validator->errors()
            );
        }

        $file = $request->file('file');

        $path = $file->store('documents', 'public');

        $sizeInKB = round($file->getSize() / 1024, 2);
        $size = $sizeInKB >= 1024
            ? round($sizeInKB / 1024, 2) . ' MB'
            : $sizeInKB . ' KB';

        $doc = Document::create([
            'title' => $request->title,
            'file' => $path,
            'size' => $size,
        ]);

        return ApiResponse::success(
            $doc,
            'Dokumen berhasil diupload',
            201
        );
    }

    public function download($id, DocumentService $service)
    {
        $doc = Document::find($id);

        if (!$doc) {
            return ApiResponse::error(
                'Dokumen tidak ditemukan',
                404
            );
        }

        $path = storage_path('app/public/' . $doc->file);

        if (!file_exists($path)) {
            return ApiResponse::error(
                'File tidak ditemukan',
                404
            );
        }

        return response()->download(
            $path,
            basename($doc->file),
            ['Content-Type' => 'application/pdf']
        );
    }

    public function destroy($id, DocumentService $service)
    {
        $doc = Document::find($id);

        if (!$doc) {
            return ApiResponse::error(
                'Dokumen tidak ditemukan',
                404
            );
        }

        Storage::disk('public')->delete($doc->file);
        $doc->delete();

        return ApiResponse::success(
            null,
            'Dokumen berhasil dihapus'
        );
    }
}
