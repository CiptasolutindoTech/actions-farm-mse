<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseLocation extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel
    protected $table = 'warehouse_location';

    // Primary key
    protected $primaryKey = 'warehouse_location_id';

    // Atribut yang dapat diisi (fillable)
    protected $fillable = [
        'warehouse_location_code',
        'description',
        'data_state',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    // Relasi ke tabel provinces
   

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'warehouse_location_id', 'warehouse_location_id');
    }
}
