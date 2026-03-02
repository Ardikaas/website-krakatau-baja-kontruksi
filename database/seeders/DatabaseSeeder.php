<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            HeroBannerSeeder::class,
            HeroVideoSeeder::class,
            WhyChooseUsSeeder::class,
            NewsSeeder::class,
            ProductSeeder::class,
            ProjectSeeder::class,
            AboutSeeder::class,
            SalesSeeder::class,
            WbsReportSeeder::class,
        ]);
    }
}
