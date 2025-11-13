<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['pn' => 'A514-55G-75BB', 'nt' => 'Acer Aspire 5 A514-55G-75BB Notebook'],
            ['pn' => 'UX3405CA', 'nt' => 'ASUS ExpertBook B3'],
            ['pn' => 'CE711A', 'nt' => 'HP Color Laserjet Professional CP577n'],
        ];

        foreach ($items as $it) {
            Product::updateOrCreate(['pn' => $it['pn']], $it);
        }
    }
}
