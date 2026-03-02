<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        // ─── about_main_images ────────────────────────────────────────────────
        DB::table('about_main_images')->truncate();
        $mainImages = [
            'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
            'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
            'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=800&q=80',
        ];

        foreach ($mainImages as $i => $imgUrl) {
            $path = $this->downloadImage($imgUrl, 'seed/about', 'main-image-' . $i);
            DB::table('about_main_images')->insert([
                'image' => $path,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // ─── about_histories ──────────────────────────────────────────────────
        DB::table('about_histories')->truncate();
        $histories = [
            [
                'year'           => '1962',
                'title'          => 'Proyek Trikora – Kelahiran Baja Nasional',
                'title_en'       => 'Trikora Project – Birth of National Steel',
                'description'    => 'Presiden Soekarno mencanangkan proyek Pabrik Baja Trikora di Cilegon sebagai tonggak awal industri baja nasional Indonesia, menandai ambisi bangsa menuju kemandirian industri berat.',
                'description_en' => 'President Soekarno inaugurated the Trikora Steel Plant project in Cilegon as the initial milestone of Indonesia\'s national steel industry, marking the nation\'s ambition toward heavy industry independence.',
                'imgUrl'         => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
            ],
            [
                'year'           => '1975',
                'title'          => 'Produksi Perdana Baja Krakatau',
                'title_en'       => 'First Production of Krakatau Steel',
                'description'    => 'Pabrik Batang dan Profil Krakatau Steel resmi berproduksi dan diresmikan oleh Presiden Soeharto, mendampingi Menteri Industri M. Jusuf. Ini merupakan tonggak bersejarah bagi industri manufaktur nasional.',
                'description_en' => 'The Krakatau Steel Bar and Section Plant officially commenced production and was inaugurated by President Soeharto, accompanied by Industry Minister M. Jusuf. A historic milestone for national manufacturing.',
                'imgUrl'         => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=800&q=80',
            ],
            [
                'year'           => '1992',
                'title'          => 'Lahirnya PT Krakatau Wajatama',
                'title_en'       => 'The Birth of PT Krakatau Wajatama',
                'description'    => 'Berdasarkan PP No. 35/1991, unit produksi batang dan profil Krakatau Steel resmi dipisahkan dan menjadi perusahaan mandiri bernama PT Krakatau Wajatama, mengkhususkan diri pada produk baja profil konstruksi.',
                'description_en' => 'Based on Government Regulation No. 35/1991, Krakatau Steel\'s bar and section production unit was officially separated and became an independent company named PT Krakatau Wajatama, specializing in construction profile steel products.',
                'imgUrl'         => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
            ],
            [
                'year'           => '2021',
                'title'          => 'Transformasi Menjadi PT Krakatau Baja Konstruksi',
                'title_en'       => 'Transformation into PT Krakatau Baja Konstruksi',
                'description'    => 'Pada 1 September 2021, PT Krakatau Wajatama resmi bertransformasi menjadi PT Krakatau Baja Konstruksi (KBK) sebagai Subholding dari PT Krakatau Steel (Persero) Tbk, memperluas lingkup bisnis ke solusi konstruksi baja terintegrasi.',
                'description_en' => 'On September 1, 2021, PT Krakatau Wajatama officially transformed into PT Krakatau Baja Konstruksi (KBK) as a Subholding of PT Krakatau Steel (Persero) Tbk, expanding its business scope to integrated steel construction solutions.',
                'imgUrl'         => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
            ],
        ];

        foreach ($histories as $i => $h) {
            $path = $this->downloadImage($h['imgUrl'], 'seed/about', 'history-' . $i);

            DB::table('about_histories')->insert([
                'year'           => $h['year'],
                'title'          => $h['title'],
                'title_en'       => $h['title_en'],
                'description'    => $h['description'],
                'description_en' => $h['description_en'],
                'image'          => $path,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }

        // ─── about_people ─────────────────────────────────────────────────────
        DB::table('about_people')->truncate();
        $people = [
            // Komisaris
            [
                'type'        => 'komisaris',
                'name'        => 'Ir. Budi Santoso, M.T.',
                'position'    => 'Komisaris Utama',
                'position_en' => 'President Commissioner',
                'imgUrl'      => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&q=80',
            ],
            [
                'type'        => 'komisaris',
                'name'        => 'Dr. Hj. Siti Rahayu, S.E., M.M.',
                'position'    => 'Komisaris Independen',
                'position_en' => 'Independent Commissioner',
                'imgUrl'      => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&q=80',
            ],
            [
                'type'        => 'komisaris',
                'name'        => 'Prof. Dr. Ahmad Fauzi, S.T., M.Eng.',
                'position'    => 'Komisaris',
                'position_en' => 'Commissioner',
                'imgUrl'      => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&q=80',
            ],
            // Direksi
            [
                'type'        => 'direksi',
                'name'        => 'Drs. Eko Prasetyo, M.B.A.',
                'position'    => 'Direktur Utama',
                'position_en' => 'President Director',
                'imgUrl'      => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&q=80',
            ],
            [
                'type'        => 'direksi',
                'name'        => 'Ir. Dewi Kartika, M.T.',
                'position'    => 'Direktur Operasi',
                'position_en' => 'Director of Operations',
                'imgUrl'      => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&q=80',
            ],
            [
                'type'        => 'direksi',
                'name'        => 'Dr. Reza Firmansyah, S.E., Ak., M.M.',
                'position'    => 'Direktur Keuangan',
                'position_en' => 'Director of Finance',
                'imgUrl'      => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80',
            ],
            [
                'type'        => 'direksi',
                'name'        => 'Ir. Teguh Wibowo, M.Sc.',
                'position'    => 'Direktur Teknik & Pengembangan',
                'position_en' => 'Director of Engineering & Development',
                'imgUrl'      => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&q=80',
            ],
        ];

        foreach ($people as $i => $person) {
            $path = $this->downloadImage($person['imgUrl'], 'seed/people', 'person-' . $i);

            DB::table('about_people')->insert([
                'type'        => $person['type'],
                'name'        => $person['name'],
                'position'    => $person['position'],
                'position_en' => $person['position_en'],
                'image'       => $path,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        // ─── about_settings ───────────────────────────────────────────────────
        DB::table('about_settings')->truncate();
        
        $companyImgPath = $this->downloadImage('https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=1200&q=80', 'seed/about', 'company-image');
        $structureImgPath = $this->downloadImage('https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&q=80', 'seed/about', 'structure-image');

        $settings = [
            [
                'key'      => 'company_image',
                'value'    => '/storage/' . $companyImgPath,
                'value_en' => '/storage/' . $companyImgPath,
            ],
            [
                'key'      => 'structure_image',
                'value'    => '/storage/' . $structureImgPath,
                'value_en' => '/storage/' . $structureImgPath,
            ],
        ];
        foreach ($settings as $s) {
            DB::table('about_settings')->insert(array_merge($s, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
