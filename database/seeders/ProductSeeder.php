<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        DB::table('products')->truncate();

        $products = [
            // Kategori: Baja Profil
            [
                'category'        => 'Baja Profil',
                'name'            => 'Baja WF (Wide Flange)',
                'name_en'         => 'Wide Flange Steel (WF)',
                'slug'            => 'baja-wf-wide-flange',
                'description'     => 'Baja WF dengan profil sayap lebar, cocok untuk konstruksi rangka atap, kolom gedung, dan jembatan. Tersedia dalam berbagai ukuran dari WF 100×100 hingga WF 600×200. Material memenuhi standar SNI 07-0329-2005 dan JIS G3101.',
                'description_en'  => 'Wide Flange steel with broad flange profiles, ideal for roof truss construction, building columns, and bridges. Available in various sizes from WF 100×100 to WF 600×200. Material meets SNI 07-0329-2005 and JIS G3101 standards.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=600&q=80',
                'spec_url'        => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=800&q=80',
            ],
            [
                'category'        => 'Baja Profil',
                'name'            => 'Baja H-Beam',
                'name_en'         => 'H-Beam Steel',
                'slug'            => 'baja-h-beam',
                'description'     => 'Baja H-Beam didesain untuk menahan beban vertikal dan horizontal secara optimal. Ideal untuk konstruksi gedung bertingkat tinggi, pabrik industri, dan struktur berat lainnya. Kekuatan tarik minimum 400 MPa.',
                'description_en'  => 'H-Beam steel is designed to withstand vertical and horizontal loads optimally. Ideal for high-rise building construction, industrial plants, and other heavy structures. Minimum tensile strength of 400 MPa.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=600&q=80',
                'spec_url'        => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
            ],
            [
                'category'        => 'Baja Profil',
                'name'            => 'Baja UNP (Kanal U)',
                'name_en'         => 'UNP Steel (U-Channel)',
                'slug'            => 'baja-unp-kanal-u',
                'description'     => 'Baja profil UNP berbentuk kanal U dengan sayap sejajar, digunakan sebagai balok anak, purlin, dan rangka dinding. Ukuran tersedia dari UNP 50 hingga UNP 300 sesuai standar DIN 1026 dan SNI.',
                'description_en'  => 'UNP profile steel in U-channel shape with parallel flanges, used as sub-beams, purlins, and wall frames. Sizes available from UNP 50 to UNP 300 per DIN 1026 and SNI standards.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=80',
                'spec_url'        => null,
            ],
            // Kategori: Baja Plat
            [
                'category'        => 'Baja Plat',
                'name'            => 'Plat Baja Hitam (Hot Rolled)',
                'name_en'         => 'Black Steel Plate (Hot Rolled)',
                'slug'            => 'plat-baja-hitam-hot-rolled',
                'description'     => 'Plat baja canai panas dengan permukaan hitam, tersedia dalam ketebalan 3mm hingga 100mm. Digunakan secara luas untuk konstruksi jembatan, tangki, kapal, dan aplikasi struktural umum. Memenuhi standar ASTM A36.',
                'description_en'  => 'Hot-rolled steel plate with black surface finish, available in thicknesses from 3mm to 100mm. Widely used for bridge construction, tanks, ships, and general structural applications. Meets ASTM A36 standard.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=600&q=80',
                'spec_url'        => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=800&q=80',
            ],
            [
                'category'        => 'Baja Plat',
                'name'            => 'Plat Baja Stainless 304',
                'name_en'         => 'Stainless Steel Plate 304',
                'slug'            => 'plat-baja-stainless-304',
                'description'     => 'Plat baja stainless SS 304 dengan kandungan chromium 18% dan nickel 8%, memberikan ketahanan korosi excellent. Ideal untuk industri makanan, farmasi, kimia, dan bangunan estetik. Tersedia dalam berbagai ketebalan dan finishing.',
                'description_en'  => 'Stainless steel plate SS 304 with 18% chromium and 8% nickel content, providing excellent corrosion resistance. Ideal for food, pharmaceutical, chemical industries, and aesthetic buildings. Available in various thicknesses and finishes.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=600&q=80',
                'spec_url'        => null,
            ],
            // Kategori: Baja Tulangan
            [
                'category'        => 'Baja Tulangan',
                'name'            => 'Baja Tulangan Ulir (Deformed Bar)',
                'name_en'         => 'Deformed Reinforcing Bar',
                'slug'            => 'baja-tulangan-ulir-deformed-bar',
                'description'     => 'Baja tulangan ulir dengan permukaan bergerigi untuk ikatan optimal dengan beton. Tersedia dalam diameter D10 hingga D40 dengan grade BJTS 420B sesuai SNI 2052. Digunakan pada struktur beton bertulang gedung, jembatan, dan bendungan.',
                'description_en'  => 'Deformed reinforcing bar with ribbed surface for optimal concrete bonding. Available in diameters D10 to D40 with grade BJTS 420B per SNI 2052. Used in reinforced concrete structures of buildings, bridges, and dams.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=600&q=80',
                'spec_url'        => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
            ],
            // Kategori: Baja Konstruksi
            [
                'category'        => 'Baja Konstruksi',
                'name'            => 'Baja Siku (Angle Bar)',
                'name_en'         => 'Angle Bar Steel',
                'slug'            => 'baja-siku-angle-bar',
                'description'     => 'Baja siku sama kaki (equal leg) dan tidak sama kaki (unequal leg) untuk berbagai aplikasi konstruksi ringan hingga berat. Digunakan pada rangka truss, bracket, penguat struktur, dan komponen mesin industri.',
                'description_en'  => 'Equal and unequal leg angle bar steel for various light to heavy construction applications. Used in truss frames, brackets, structural reinforcements, and industrial machine components.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=600&q=80',
                'spec_url'        => null,
            ],
            [
                'category'        => 'Baja Konstruksi',
                'name'            => 'Pipa Baja Seamless',
                'name_en'         => 'Seamless Steel Pipe',
                'slug'            => 'pipa-baja-seamless',
                'description'     => 'Pipa baja tanpa sambungan las (seamless) dengan ketahanan tekanan tinggi dan permukaan interior yang halus. Ideal untuk aplikasi minyak dan gas, penjangkauan sumur, sistem perpipaan industri bertekanan tinggi, dan struktur offshore.',
                'description_en'  => 'Seamless steel pipes without welded joints, featuring high pressure resistance and smooth interior surface. Ideal for oil and gas applications, well casing, high-pressure industrial piping systems, and offshore structures.',
                'thumb_url'       => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=600&q=80',
                'spec_url'        => 'https://images.unsplash.com/photo-1518623001395-125242310d0c?w=800&q=80',
            ],
        ];

        foreach ($products as $i => $product) {
            $thumbPath = null;
            if ($product['thumb_url']) {
                $thumbDown = $this->downloadImage($product['thumb_url'], 'seed/products', 'product-thumb-' . $i);
                $thumbPath = json_encode([$thumbDown]);
            }

            $specPath = null;
            if ($product['spec_url']) {
                $specPath = $this->downloadImage($product['spec_url'], 'seed/products', 'product-spec-' . $i);
            }

            DB::table('products')->insert([
                'category'       => $product['category'],
                'name'           => $product['name'],
                'name_en'        => $product['name_en'],
                'slug'           => $product['slug'],
                'description'    => $product['description'],
                'description_en' => $product['description_en'],
                'thumbnail'      => $thumbPath,
                'spec_image'     => $specPath,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
