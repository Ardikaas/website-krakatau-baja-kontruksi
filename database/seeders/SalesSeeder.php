<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    use DownloadsImages;

    public function run(): void
    {
        DB::table('sales')->truncate();

        $sales = [
            [
                'name'       => 'Budi Priyanto',
                'contact'    => '+62 811-2345-6789',
                'imgUrl'     => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&q=80',
                'categories' => 'Baja Profil, Baja WF, H-Beam, UNP',
            ],
            [
                'name'       => 'Sari Dewi Kusuma',
                'contact'    => '+62 812-3456-7890',
                'imgUrl'     => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&q=80',
                'categories' => 'Baja Plat, Plat Hitam, Plat Stainless',
            ],
            [
                'name'       => 'Hendra Wijaya',
                'contact'    => '+62 813-4567-8901',
                'imgUrl'     => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&q=80',
                'categories' => 'Baja Tulangan, Besi Beton, Wiremesh',
            ],
            [
                'name'       => 'Rina Agustina',
                'contact'    => '+62 814-5678-9012',
                'imgUrl'     => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&q=80',
                'categories' => 'Pipa Baja, Konstruksi Baja, Proyek Khusus',
            ],
        ];

        foreach ($sales as $i => $sale) {
            $path = $this->downloadImage($sale['imgUrl'], 'seed/sales', 'sales-' . $i);

            DB::table('sales')->insert([
                'name'       => $sale['name'],
                'contact'    => $sale['contact'],
                'photo'      => $path,
                'categories' => $sale['categories'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
