<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhyChooseUsSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        DB::table('why_choose_us')->truncate();

        $items = [
            [
                'title'          => 'Kualitas Baja Terjamin',
                'title_en'       => 'Certified Steel Quality',
                'imgUrl'         => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
                'imgName'        => 'why-quality',
                'description'    => 'Seluruh produk baja kami telah memenuhi standar SNI dan ISO, memastikan kekuatan dan durabilitas yang konsisten untuk setiap proyek konstruksi.',
                'description_en' => 'All our steel products meet SNI and ISO standards, ensuring consistent strength and durability for every construction project.',
            ],
            [
                'title'          => 'Pengiriman Tepat Waktu',
                'title_en'       => 'On-Time Delivery',
                'imgUrl'         => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&q=80',
                'imgName'        => 'why-delivery',
                'description'    => 'Dengan armada logistik terintegrasi, kami berkomitmen mengirimkan material sesuai jadwal yang disepakati.',
                'description_en' => 'With an integrated logistics fleet, we are committed to delivering materials on the agreed schedule.',
            ],
            [
                'title'          => 'Tim Ahli Berpengalaman',
                'title_en'       => 'Experienced Expert Team',
                'imgUrl'         => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=80',
                'imgName'        => 'why-team',
                'description'    => 'Lebih dari 30 tahun pengalaman di industri baja konstruksi memberi kami keunggulan dalam solusi teknis terbaik.',
                'description_en' => 'Over 30 years of experience in the steel construction industry gives us the edge in providing the best technical solutions.',
            ],
            [
                'title'          => 'Kapasitas Produksi Besar',
                'title_en'       => 'High Production Capacity',
                'imgUrl'         => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
                'imgName'        => 'why-capacity',
                'description'    => 'Fasilitas produksi modern kami mampu menghasilkan ribuan ton baja per bulan untuk proyek skala nasional.',
                'description_en' => 'Our modern production facilities can produce thousands of tons of steel per month for national-scale projects.',
            ],
        ];

        foreach ($items as $item) {
            $path = $this->downloadImage($item['imgUrl'], 'seed/why-choose-us', $item['imgName']);
            DB::table('why_choose_us')->insert([
                'title'          => $item['title'],
                'title_en'       => $item['title_en'],
                'image'          => $path,
                'description'    => $item['description'],
                'description_en' => $item['description_en'],
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
