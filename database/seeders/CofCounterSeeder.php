<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CofCounter;

class CofCounterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['branch_id' => 1, 'current_number' => 0],
            ['branch_id' => 2, 'current_number' => 0],
            ['branch_id' => 3, 'current_number' => 0],
            ['branch_id' => 4, 'current_number' => 0],
            ['branch_id' => 5, 'current_number' => 0],
        ];

        CofCounter::insert($data);
    }
}
