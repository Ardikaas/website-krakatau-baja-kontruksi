<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        DB::table('projects')->truncate();

        $projects = [
            [
                'title'            => 'Jembatan Bentang Panjang Cilamaya, Karawang',
                'title_en'         => 'Cilamaya Long-Span Bridge, Karawang',
                'client'           => 'Kementerian PUPR',
                'location'         => 'Karawang, Jawa Barat',
                'category'         => 'Jembatan',
                'category_en'      => 'Bridge',
                'date'             => '2024-03-15',
                'description'      => 'Pembangunan jembatan baja bentang panjang sepanjang 420 meter yang menghubungkan Kabupaten Karawang dengan Kabupaten Subang. Proyek ini menggunakan teknologi girder baja komposit dan fondasi tiang pancang beton bertulang.',
                'description_en'   => 'Construction of a 420-meter long-span steel bridge connecting Karawang Regency with Subang Regency. This project uses composite steel girder technology and reinforced concrete pile foundations.',
                'scope_of_work'    => 'Fabrikasi dan erection struktur baja utama 8.500 ton, pengadaan material baja struktural, uji NDT (Non-Destructive Testing) seluruh sambungan las, coating anti-korosi sistem 3-lapis, instalasi ekspansi joint dan bearing pad.',
                'scope_of_work_en' => 'Fabrication and erection of 8,500 tons of main steel structure, procurement of structural steel materials, NDT (Non-Destructive Testing) of all weld joints, 3-layer anti-corrosion coating system, installation of expansion joints and bearing pads.',
                'challenges'       => 'Kondisi tanah lunak dengan daya dukung rendah di sekitar tepi sungai, jadwal pelaksanaan yang sangat ketat akibat kebutuhan mendesak konektivitas wilayah, serta tantangan teknis erection di tengah sungai yang harus dilakukan tanpa menghentikan aliran air.',
                'challenges_en'    => 'Soft soil conditions with low bearing capacity near the riverbanks, a very tight implementation schedule due to the urgent need for regional connectivity, and the technical challenge of mid-river erection without stopping water flow.',
                'solutions'        => json_encode([
                    'Penggunaan pondasi bored pile diameter 1000mm sedalam 30 meter untuk mengatasi tanah lunak',
                    'Sistem launching gantry khusus untuk erection segmen jembatan di atas air',
                    'Manajemen proyek dengan metode fast-track menggunakan konstruksi prefabrikasi',
                ]),
                'solutions_en'     => json_encode([
                    'Use of 1000mm diameter bored pile foundations at 30 meters depth to overcome soft soil',
                    'Special launching gantry system for bridge segment erection over water',
                    'Fast-track project management method using prefabricated construction',
                ]),
                'imgUrl'           => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&q=80',
            ],
            [
                'title'            => 'Gedung Perkantoran Terpadu Graha Baja Tower, Jakarta',
                'title_en'         => 'Graha Baja Tower Integrated Office Building, Jakarta',
                'client'           => 'PT Graha Properti Nusantara',
                'location'         => 'Jakarta Selatan, DKI Jakarta',
                'category'         => 'Gedung',
                'category_en'      => 'Building',
                'date'             => '2023-06-01',
                'description'      => 'Pembangunan struktur baja utama gedung perkantoran premium 28 lantai di kawasan SCBD Jakarta. Proyek mencakup fabrikasi dan instalasi kolom baja komposit, balok baja, dan sistem floor deck yang inovatif.',
                'description_en'   => 'Construction of the main steel structure for a 28-story premium office building in Jakarta\'s SCBD area. The project includes fabrication and installation of composite steel columns, steel beams, and an innovative floor deck system.',
                'scope_of_work'    => 'Fabrikasi 12.000 ton baja struktural, instalasi kolom CFT (Concrete Filled Tube), pemasangan sistem shear wall baja, koordinasi MEP untuk penetrasi balok, dan uji pembebanan struktur.',
                'scope_of_work_en' => 'Fabrication of 12,000 tons of structural steel, installation of CFT (Concrete Filled Tube) columns, installation of steel shear wall system, MEP coordination for beam penetrations, and structural load testing.',
                'challenges'       => 'Keterbatasan area kerja di pusat kota yang padat, koordinasi multi-disiplin yang intensif dengan subkontraktor MEP dan arsitek, serta persyaratan keselamatan kerja tingkat tinggi untuk high-rise building.',
                'challenges_en'    => 'Limited work area in the dense city center, intensive multi-discipline coordination with MEP subcontractors and architects, and high-level work safety requirements for high-rise buildings.',
                'solutions'        => json_encode([
                    'Prefabrikasi maksimal di workshop untuk meminimalkan pekerjaan di lokasi',
                    'Penggunaan tower crane dengan kapasitas angkat 32 ton',
                    'Implementasi Building Information Modeling (BIM) untuk koordinasi antar disiplin',
                ]),
                'solutions_en'     => json_encode([
                    'Maximum prefabrication at workshop to minimize on-site work',
                    'Use of tower crane with 32-ton lifting capacity',
                    'Implementation of Building Information Modeling (BIM) for inter-discipline coordination',
                ]),
                'imgUrl'           => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
            ],
            [
                'title'            => 'Pabrik Petrokimia PT Chandra Asri, Cilegon',
                'title_en'         => 'PT Chandra Asri Petrochemical Plant, Cilegon',
                'client'           => 'PT Chandra Asri Petrochemical Tbk',
                'location'         => 'Cilegon, Banten',
                'category'         => 'Industri',
                'category_en'      => 'Industrial',
                'date'             => '2023-01-10',
                'description'      => 'Fabrikasi dan instalasi struktur baja untuk fasilitas petrokimia baru kapasitas 500.000 ton per tahun. Proyek meliputi struktur pipetrack, equipment support, building struktur, dan tangki penyimpanan.',
                'description_en'   => 'Fabrication and installation of steel structures for a new petrochemical facility with a capacity of 500,000 tons per year. The project includes pipetrack structures, equipment supports, building structures, and storage tanks.',
                'scope_of_work'    => 'Fabrikasi 6.500 ton struktur baja, instalasi 45km jaringan pipetrack, 8 unit tangki penyimpanan berbahan baja tahan korosi, dan sistem grounding fasilitas.',
                'scope_of_work_en' => 'Fabrication of 6,500 tons of steel structures, installation of 45km of pipetrack network, 8 units of corrosion-resistant steel storage tanks, and facility grounding systems.',
                'challenges'       => 'Persyaratan keselamatan proses (Process Safety) yang ketat untuk lingkungan petrokimia, material baja khusus dengan sertifikasi NACE untuk ketahanan korosi kimia, dan pekerjaan di area brownfield dengan fasilitas operasional yang sedang berjalan.',
                'challenges_en'    => 'Strict Process Safety requirements for the petrochemical environment, special NACE-certified steel materials for chemical corrosion resistance, and work in a brownfield area with ongoing operational facilities.',
                'solutions'        => json_encode([
                    'Audit keselamatan proses setiap minggu dengan konsultan HSE independen',
                    'Pengadaan material baja duplex stainless dan alloy steel sesuai spesifikasi NACE MR0175',
                    'Penetapan zona kerja dengan permit-to-work (PTW) system ketat',
                ]),
                'solutions_en'     => json_encode([
                    'Weekly process safety audit with independent HSE consultant',
                    'Procurement of duplex stainless and alloy steel per NACE MR0175 specification',
                    'Work zone designation with strict permit-to-work (PTW) system',
                ]),
                'imgUrl'           => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
            ],
            [
                'title'            => 'Dermaga Curah Batubara Terminal Barang Umum, Pelabuhan Tanjung Priok',
                'title_en'         => 'Coal Bulk Jetty - General Cargo Terminal, Tanjung Priok Port',
                'client'           => 'PT Pelabuhan Indonesia II (Persero)',
                'location'         => 'Tanjung Priok, Jakarta Utara',
                'category'         => 'Pelabuhan',
                'category_en'      => 'Port',
                'date'             => '2022-08-20',
                'description'      => 'Pembangunan dermaga baja untuk bongkar muat batubara dan general cargo dengan kapasitas 5 juta ton per tahun. Struktur dermaga dirancang tahan terhadap lingkungan laut yang korosif dengan sistem proteksi katodik terintegrasi.',
                'description_en'   => 'Construction of a steel jetty for coal and general cargo loading/unloading with a capacity of 5 million tons per year. The jetty structure is designed to withstand the corrosive marine environment with an integrated cathodic protection system.',
                'scope_of_work'    => 'Fabrikasi 9.200 ton struktur baja laut, instalasi 180 unit tiang pancang baja diameter 600mm, sistem fender dan bollard, jalur rel crane 720 meter, dan coating sistem epoxy zinc silicate khusus aplikasi marine.',
                'scope_of_work_en' => 'Fabrication of 9,200 tons of marine steel structures, installation of 180 units of 600mm diameter steel piles, fender and bollard system, 720-meter rail track for cranes, and epoxy zinc silicate coating for marine applications.',
                'challenges'       => 'Proses pemasangan tiang pancang di laut lepas dengan kondisi pasang-surut, persyaratan coating sangat ketat untuk lingkungan marine dengan kadar garam tinggi, serta transportasi material berat ke lokasi yang hanya dapat diakses melalui jalur laut.',
                'challenges_en'    => 'Installing piles in open sea with tidal conditions, very strict coating requirements for high-salinity marine environments, and transportation of heavy materials to a location accessible only by sea.',
                'solutions'        => json_encode([
                    'Penggunaan derrick barge dan crane barge untuk operasi di laut',
                    'Sistem coating marine grade dengan 5 lapisan total DFT 450 mikron',
                    'Koordinasi ketat dengan otoritas pelabuhan dan maritime authority',
                ]),
                'solutions_en'     => json_encode([
                    'Use of derrick barge and crane barge for sea operations',
                    'Marine grade coating system with 5 layers, total DFT 450 microns',
                    'Close coordination with port and maritime authorities',
                ]),
                'imgUrl'           => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=800&q=80',
            ],
        ];

        foreach ($projects as $i => $project) {
            $path = $this->downloadImage($project['imgUrl'], 'seed/projects', 'project-' . $i);

            DB::table('projects')->insert([
                'title'            => $project['title'],
                'title_en'         => $project['title_en'],
                'client'           => $project['client'],
                'location'         => $project['location'],
                'category'         => $project['category'],
                'category_en'      => $project['category_en'],
                'date'             => $project['date'],
                'description'      => $project['description'],
                'description_en'   => $project['description_en'],
                'scope_of_work'    => $project['scope_of_work'],
                'scope_of_work_en' => $project['scope_of_work_en'],
                'challenges'       => $project['challenges'],
                'challenges_en'    => $project['challenges_en'],
                'solutions'        => $project['solutions'],
                'solutions_en'     => $project['solutions_en'],
                'image'            => $path,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
