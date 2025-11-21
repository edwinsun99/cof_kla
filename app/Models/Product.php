<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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