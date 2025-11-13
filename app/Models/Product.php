<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> 1ceaeb5f97112d2834eed21cc13180f9d2e49f31
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
<<<<<<< HEAD
    use HasFactory; // penting kalau nanti kamu pakai seeder/factory

    /**
     * Nama tabel yang digunakan.
     */
    protected $table = 'products';

    /**
     * Kolom yang boleh diisi secara mass-assignment.
     */
    protected $fillable = [
        'pn',   // Product Number
        'nt',   // Nama Type / Nama Produk
    ];

    /**
     * Kolom yang otomatis dikelola oleh Laravel.
     * (created_at & updated_at)
     */
    public $timestamps = true;

    /**
     * (Opsional) Jika primary key bukan 'id', bisa diatur manual:
     * protected $primaryKey = 'id_produk';
     */
}

=======
    protected $table = 'product'; // pakai tabel manual
    protected $fillable = [
       'pn',
       'nm_type'
    ];
}
>>>>>>> 1ceaeb5f97112d2834eed21cc13180f9d2e49f31
