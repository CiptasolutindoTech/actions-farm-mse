<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Order_Type extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseOrderTypeFactory> */
    use HasFactory;
    protected $table = 'purchase_order_type';
    protected $primaryKey = 'purchase_order_type_id';
    public $timestamps = true;
    protected $fillable = [
        'purchase_order_type_name',
    ];
}
