<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DocumentService;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function destroy(int $id, DocumentService $service)
    {
        $service->delete($id);
        return back();
    }

    public function store(Request $request, DocumentService $service)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
            'title_en' => 'nullable|string|max:255'
        ]);

        $doc = $service->store($request->file('file'), null, $request->title_en);

        return response()->json([
            'message' => 'Dokumen berhasil diupload',
            'data' => $doc
        ]);
    }

    public function download(int $id)
    {
        $doc = Document::findOrFail($id);

        if (!Storage::disk('public')->exists($doc->file)) {
            abort(404);
        }

        return Storage::disk('public')->download(
            $doc->file,
            $doc->title . '.pdf',
            ['Content-Type' => 'application/pdf']
        );
    }
}
