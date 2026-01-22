<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use App\Models\HeroBanner;
use App\Models\WhyChooseUs;

class HomeController extends Controller
{
    public function index(NewsService $service)
    {
        $news = $service->latest(4);

        $heroBanners = HeroBanner::latest()->take(3)->get();
        $whyChooseUs = WhyChooseUs::all();

        return view('front.home', compact(
            'news',
            'heroBanners',
            'whyChooseUs'
        ));
    }
}
