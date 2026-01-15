<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\NewsService;

class HomeController extends Controller
{
    public function index(NewsService $service)
    {
        $news = $service->latest(4);

        return view('front.home', compact('news'));
    }
}
