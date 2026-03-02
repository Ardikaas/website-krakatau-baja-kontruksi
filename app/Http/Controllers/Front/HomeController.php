<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use App\Models\HeroBanner;
use App\Models\WhyChooseUs;
use App\Models\Product;
use App\Models\Project;

class HomeController extends Controller
{
    public function index(NewsService $service)
    {
        $news = $service->latest(4);

        $heroBanners = HeroBanner::latest()->take(3)->get();
        $whyChooseUs = WhyChooseUs::all();
        $products = Product::latest()->get();
        $projects = Project::latest()->get();

        return view('front.home', compact(
            'news',
            'heroBanners',
            'whyChooseUs',
            'products',
            'projects'
        ));
    }
}
