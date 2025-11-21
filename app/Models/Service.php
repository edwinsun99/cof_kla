<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    
    protected $fillable = [
        'cof_id',
        'received_date', 
        'started_date', 
        'finished_date',
        'contact', 
        'customer_name',    
        'email', 
        'phone_number',
        'address',
        'nama_type',
        'status',
        'brand',
        'product_number',
        'serial_number',
        'fault_description',
        'accessories',
        'kondisi_unit',
        'repair_summary',
        'erf_file'
    ];

    // ⬇⬇⬇ Tambahkan relasinya DI SINI ⬇⬇⬇
    public function lognote()
    {
        return $this->hasMany(Lognote::class, 'cof_id');
    }
}
