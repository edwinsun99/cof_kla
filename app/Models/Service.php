<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services'; // pakai tabel manual
    protected $fillable = [
        'received_date', 
        'started_date', 
        'finished_date',
        'contact', 
        'customer_name',
        'email', 
        'phone_number',
        'address',
        'nama_type',
        'brand',
        'product_number',
        'serial_number',
        'fault_description',
        'accessories',
        'kondisi_unit',
        'repair_summary'
    ];
}
