<?php

namespace App\Services;

use App\Models\Document;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
  const MAX_DOCUMENT = 2;

  public function list()
  {
    return Document::latest()->get();
  }

  public function store(UploadedFile $file, string $title = null): Document
  {
    if (Document::count() >= self::MAX_DOCUMENT) {
      throw new \Exception('Dokumen maksimal 2 item');
    }

    $path = $file->store('documents', 'public');

    $sizeInKB = round($file->getSize() / 1024, 2);
    $size = $sizeInKB >= 1024
      ? round($sizeInKB / 1024, 2) . ' MB'
      : $sizeInKB . ' KB';

    return Document::create([
      'title' => $title ?? pathinfo(
        $file->getClientOriginalName(),
        PATHINFO_FILENAME
      ),
      'file' => $path,
      'size' => $size,
    ]);
  }

  public function delete(int $id): void
  {
    $doc = Document::findOrFail($id);

    Storage::disk('public')->delete($doc->file);
    $doc->delete();
  }
}
