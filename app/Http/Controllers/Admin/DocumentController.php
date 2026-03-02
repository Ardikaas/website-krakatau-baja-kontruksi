<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DocumentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

  public function adminLanding(DocumentService $documentService)
  {
    return view('admin.adminLanding', [
      'documents' => $documentService->list()
    ]);
  }

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

}
