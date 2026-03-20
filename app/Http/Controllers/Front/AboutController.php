<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutHistory;
use App\Models\AboutMainImage;
use App\Models\AboutPerson;
use App\Models\AboutSetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $dbImages = AboutMainImage::orderBy('id')->limit(3)->get();

        $defaultImages = [
            asset('images/resource/about-company-1.jpeg'),
            asset('images/resource/about-company-2.jpeg'),
            asset('images/resource/about-company-3.jpeg'),
        ];

        $mainImages = collect();

        for ($i = 0; $i < 3; $i++) {
            if (isset($dbImages[$i])) {
                $mainImages->push(
                    route('admin.aboutus.view', ['filename' => $dbImages[$i]->image])
                );
            } else {
                $mainImages->push($defaultImages[$i]);
            }
        }

        $direksi = AboutPerson::where('type', 'direksi')->orderBy('id')->get();
        $komisaris = AboutPerson::where('type', 'komisaris')->orderBy('id')->get();

        return view('front.aboutus', [
            'mainImages' => $mainImages,
            'histories' => AboutHistory::orderBy('year')->limit(7)->get(),
            'companyImage' => AboutSetting::where('key', 'company_image')->first(),
            'structureImage' => AboutSetting::where('key', 'structure_image')->first(),
            'direksi' => $direksi,
            'komisaris' => $komisaris,
        ]);
    }
    public function showCv($id)
    {
        $person = AboutPerson::findOrFail($id);
        
        return view('front.cv', [
            'person' => $person
        ]);
    }
}
