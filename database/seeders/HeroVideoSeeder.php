<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroVideoSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        DB::table('hero_videos')->truncate();

        $thumb = $this->downloadImage(
            'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=1280&q=80',
            'seed/videos',
            'hero-video-thumb'
        );

        DB::table('hero_videos')->insert([
            'thumbnail'  => $thumb,
            'video_url'  => 'https://www.youtube.com/watch?v=_V14pN1dz0c',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
