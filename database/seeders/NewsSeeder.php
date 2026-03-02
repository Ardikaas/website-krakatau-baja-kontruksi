<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        DB::table('news')->truncate();

        $news = [
            [
                'imgUrl'     => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
                'imgName'    => 'news-1',
                'title'      => 'PT Krakatau Baja Konstruksi Raih Kontrak Pembangunan Jembatan Senilai Rp 450 Miliar',
                'title_en'   => 'PT Krakatau Baja Konstruksi Wins Bridge Construction Contract Worth IDR 450 Billion',
                'content'    => '<p>PT Krakatau Baja Konstruksi (KBK) resmi mendapatkan kontrak pembangunan Jembatan Cilamaya dari Kementerian Pekerjaan Umum dan Perumahan Rakyat (PUPR). Proyek senilai Rp 450 miliar ini ditargetkan selesai dalam waktu 24 bulan sejak penandatanganan kontrak.</p><p>Direktur Utama KBK menyampaikan bahwa keberhasilan ini merupakan bukti nyata kepercayaan pemerintah terhadap kemampuan industri baja nasional. "Kami akan mengoptimalkan seluruh kapasitas produksi untuk memastikan kualitas dan ketepatan waktu pengerjaan," ujarnya.</p><p>Jembatan Cilamaya akan membentang sepanjang 420 meter dengan menggunakan baja struktural berkualitas tinggi produksi KBK, menggantikan jembatan lama yang sudah berusia lebih dari 40 tahun.</p>',
                'content_en' => '<p>PT Krakatau Baja Konstruksi (KBK) has officially secured the Cilamaya Bridge construction contract from the Ministry of Public Works and Public Housing (PUPR). The project, worth IDR 450 billion, is targeted to be completed within 24 months of contract signing.</p><p>The President Director of KBK stated that this success is tangible proof of the government\'s trust in the capabilities of the national steel industry. "We will optimize all our production capacity to ensure quality and timely completion," he said.</p><p>The Cilamaya Bridge will span 420 meters using high-quality structural steel produced by KBK, replacing the old bridge that is over 40 years old.</p>',
                'author'        => 'Tim Komunikasi KBK',
                'published_at'  => now()->subDays(3),
            ],
            [
                'imgUrl'     => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=800&q=80',
                'imgName'    => 'news-2',
                'title'      => 'Inovasi Baja Ramah Lingkungan: KBK Luncurkan Lini Produk Green Steel',
                'title_en'   => 'Eco-Friendly Steel Innovation: KBK Launches Green Steel Product Line',
                'content'    => '<p>Sejalan dengan komitmen nasional dalam mengurangi emisi karbon, PT Krakatau Baja Konstruksi meluncurkan lini produk "Green Steel" yang diproduksi menggunakan energi terbarukan dan teknologi daur ulang canggih.</p><p>Produk Green Steel KBK berhasil mengurangi emisi CO₂ sebesar 35% dibandingkan proses produksi baja konvensional. Inovasi ini disambut antusias oleh pelaku industri konstruksi yang semakin menaruh perhatian pada keberlanjutan lingkungan.</p><p>Sertifikasi ISO 14001 telah dikantongi KBK sebagai bukti komitmen perusahaan terhadap manajemen lingkungan yang bertanggung jawab.</p>',
                'content_en' => '<p>In line with the national commitment to reduce carbon emissions, PT Krakatau Baja Konstruksi launched the "Green Steel" product line, produced using renewable energy and advanced recycling technology.</p><p>KBK\'s Green Steel products successfully reduce CO₂ emissions by 35% compared to conventional steel production processes. This innovation was enthusiastically welcomed by the construction industry, which is increasingly focused on environmental sustainability.</p><p>KBK has obtained ISO 14001 certification as proof of the company\'s commitment to responsible environmental management.</p>',
                'author'        => 'Divisi R&D KBK',
                'published_at'  => now()->subDays(10),
            ],
            [
                'imgUrl'     => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
                'imgName'    => 'news-3',
                'title'      => 'KBK Ekspansi Kapasitas Produksi, Tambah 3 Lini Baru di Cilegon',
                'title_en'   => 'KBK Expands Production Capacity, Adds 3 New Lines in Cilegon',
                'content'    => '<p>PT Krakatau Baja Konstruksi mengumumkan investasi senilai Rp 1,2 triliun untuk ekspansi kapasitas produksi di pabrik utama Cilegon, Banten. Tiga lini produksi baru ditargetkan beroperasi penuh pada awal tahun 2027.</p><p>Ekspansi ini akan meningkatkan kapasitas produksi KBK dari 180.000 ton per tahun menjadi 300.000 ton per tahun, menjadikan KBK salah satu produsen baja konstruksi terbesar di Asia Tenggara.</p>',
                'content_en' => '<p>PT Krakatau Baja Konstruksi announced an investment of IDR 1.2 trillion to expand production capacity at the main plant in Cilegon, Banten. Three new production lines are targeted to be fully operational in early 2027.</p><p>This expansion will increase KBK\'s production capacity from 180,000 tons per year to 300,000 tons per year, making KBK one of the largest construction steel producers in Southeast Asia.</p>',
                'author'        => 'Tim Komunikasi KBK',
                'published_at'  => now()->subDays(18),
            ],
            [
                'imgUrl'     => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&q=80',
                'imgName'    => 'news-4',
                'title'      => 'Sinergi KBK dan PLN dalam Pembangunan Infrastruktur Transmisi Listrik Nasional',
                'title_en'   => 'KBK and PLN Synergy in National Electricity Transmission Infrastructure Development',
                'content'    => '<p>PT Krakatau Baja Konstruksi resmi menandatangani perjanjian kerja sama strategis dengan PT PLN (Persero) untuk penyediaan material baja dalam program pembangunan jaringan transmisi listrik 500 kV yang membentang dari Sumatera hingga Jawa.</p><p>Proyek kolaborasi ini akan membutuhkan sekitar 45.000 ton baja profil dan baja struktural yang akan dipenuhi oleh KBK dalam 3 tahap pengiriman selama 18 bulan ke depan.</p>',
                'content_en' => '<p>PT Krakatau Baja Konstruksi officially signed a strategic cooperation agreement with PT PLN (Persero) for the supply of steel materials in the 500 kV electricity transmission network construction program spanning from Sumatra to Java.</p><p>This collaborative project will require approximately 45,000 tons of profile and structural steel, which will be supplied by KBK in 3 delivery phases over the next 18 months.</p>',
                'author'        => 'Divisi Pemasaran KBK',
                'published_at'  => now()->subDays(30),
            ],
            [
                'imgUrl'     => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
                'imgName'    => 'news-5',
                'title'      => 'KBK Raih Penghargaan Best Practice dalam Forum Industri Baja ASEAN 2025',
                'title_en'   => 'KBK Wins Best Practice Award at ASEAN Steel Industry Forum 2025',
                'content'    => '<p>PT Krakatau Baja Konstruksi berhasil meraih penghargaan "Best Practice in Steel Manufacturing" dalam ASEAN Steel Industry Forum 2025 yang diselenggarakan di Kuala Lumpur, Malaysia. Penghargaan ini diberikan atas komitmen KBK dalam penerapan teknologi produksi terkini dan standar keselamatan kerja yang tinggi.</p>',
                'content_en' => '<p>PT Krakatau Baja Konstruksi successfully won the "Best Practice in Steel Manufacturing" award at the ASEAN Steel Industry Forum 2025 held in Kuala Lumpur, Malaysia. The award was given for KBK\'s commitment to applying the latest production technology and high occupational safety standards.</p>',
                'author'        => 'Tim Komunikasi KBK',
                'published_at'  => now()->subDays(45),
            ],
        ];

        foreach ($news as $item) {
            $path = $this->downloadImage($item['imgUrl'], 'seed/news', $item['imgName']);
            DB::table('news')->insert([
                'image'         => $path,
                'title'         => $item['title'],
                'title_en'      => $item['title_en'],
                'content'       => $item['content'],
                'content_en'    => $item['content_en'],
                'author'        => $item['author'],
                'published_at'  => $item['published_at'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
