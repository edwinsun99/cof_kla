<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product'; // pakai tabel manual
    protected $fillable = [
       'pn',
       'nm_type'
    ];
}
