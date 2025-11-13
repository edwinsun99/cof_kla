<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $fillable = ['name', 'prefix'];

    // 🔹 1 cabang punya 1 counter
    public function counter()
    {
        return $this->hasOne(CofCounters::class, 'branch_id');
    }

    // 🔹 1 cabang punya banyak service
    public function services()
    {
        return $this->hasMany(Service::class, 'branch_id');
    }
}
