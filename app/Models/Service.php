<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'cof_id', 'branch_id', 'customer_name', 'contact', 'address',
        'phone_number', 'received_date', 'started_date', 'finished_date',
        'email',
        'brand', 'product_number', 'serial_number', 'nama_type',
        'fault_description', 'kondisi_unit', 'repair_summary', 'accessories'
    ];

    // 🔹 Setiap service milik satu cabang
    public function branch()
    {
        return $this->belongsTo(Branches::class, 'branch_id');
    }
    // di model Service.php
public static function generateCofId($branch_id)
{
    $branch = Branch::find($branch_id);
    $counter = CofCounter::firstOrCreate(
        ['branch_id' => $branch_id],
        ['current_number' => 0]
    );

    $nextNumber = $counter->current_number + 1;
    $counter->update(['current_number' => $nextNumber]);

    return $branch->prefix . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
}
=======
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
>>>>>>> 1ceaeb5f97112d2834eed21cc13180f9d2e49f31
}
