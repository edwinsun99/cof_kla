<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\CofCounters;
use App\Models\Branches;
use RuntimeException;

class CofIdGenerator
{
    /**
     * Generate COF-ID unik untuk sebuah branch.
     * Menggunakan DB transaction + lockForUpdate -> aman dari race condition.
     *
     * @param int $branchId
     * @return string
     * @throws RuntimeException
     */
    public function generateForBranch(int $branchId): string
    {
        return DB::transaction(function () use ($branchId) {
            // pastikan branch ada
            $branch = Branches::find($branchId);
            if (!$branch) {
                throw new RuntimeException("Branch id {$branchId} tidak ditemukan.");
            }

            // ambil baris counter dan lock
            $counter = CofCounters::where('branch_id', $branchId)->lockForUpdate()->first();

            if (!$counter) {
                $counter = CofCounters::create([
                    'branch_id' => $branchId,
                    'current_number' => 0,
                ]);
                $num = 1;
            } else {
                $num = $counter->current_number + 1;
                $counter->update(['current_number' => $num]);
            }

            // prefix wajib 1 karakter
            $prefix = $branch->prefix ?? 'X';

            // format 6 digit, misal A000001
            return sprintf('%s%06d', $prefix, $num);
        }, 5); // retry 5 kali kalau deadlock
    }
}
