<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch; // 🔹 <── INI WAJIB ADA!

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            ['name' => 'Semarang', 'prefix' => 'A'],
            ['name' => 'Slawi', 'prefix' => 'B'],
            ['name' => 'Tegal', 'prefix' => 'C'],
            ['name' => 'Pekalongan', 'prefix' => 'D'],
            ['name' => 'Kediri', 'prefix' => 'E'],
        ];

        foreach ($branches as $branch) {
            Branch::firstOrCreate(['name' => $branch['name']], $branch);
        }
    }
}
