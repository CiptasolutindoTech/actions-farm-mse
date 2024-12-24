<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouses';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'warehouse_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'warehouse_location_id',
        'warehouse_code',
        'warehouse_type',
        'warehouse_name',
        'warehouse_address',
        'warehouse_phone',
        'warehouse_remark',
        'data_state',
        'created_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data_state' => 'decimal:1',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relasi ke WarehouseLocation
    public function warehouselocation()
    {
        return $this->belongsTo(WarehouseLocation::class, 'warehouse_location_id', 'warehouse_location_id');
    }
}
