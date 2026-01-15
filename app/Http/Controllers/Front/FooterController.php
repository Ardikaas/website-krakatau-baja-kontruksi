<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\DocumentService;

class FooterController extends Controller
{
  public function getDocuments(DocumentService $documentService)
  {
    return $documentService->list()->take(2);
  }
}
