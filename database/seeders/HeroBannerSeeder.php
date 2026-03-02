<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroBannerSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        DB::table('hero_banners')->truncate();

        $banners = [
            ['url' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=1600&q=80', 'name' => 'banner1'],
            ['url' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1600&q=80', 'name' => 'banner2'],
            ['url' => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=1600&q=80', 'name' => 'banner3'],
        ];

        foreach ($banners as $b) {
            $path = $this->downloadImage($b['url'], 'seed/heroes', $b['name']);
            DB::table('hero_banners')->insert([
                'image'      => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
