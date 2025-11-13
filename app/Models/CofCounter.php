<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CofCounter extends Model
{
    protected $fillable = ['branch_id', 'current_number'];

    // 🔹 Setiap counter hanya milik satu cabang
    public function branch()
    {
        return $this->belongsTo(Branches::class, 'branch_id');
    }
}
