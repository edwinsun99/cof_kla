<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lognote extends Model
{
    protected $table = 'lognote'; // pakai tabel manual
    protected $fillable = [
        'cof_id',
        'username',
        'logdesc'
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'un', 'cof_id');
}
}
