<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Order_Item extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseOrderItemFactory> */
    use HasFactory;
    protected $table = 'purchase_order_item';
    protected $primaryKey = 'purchase_order_item_id';
    public $timestamps = true;
    protected $fillable = [
        'purchase_order_id',
        'purchase_requisition_id',
        'purchase_requisition_item_id',
        'item_category_id',
        'item_unit_id',
        'item_type_id',
        'quantity',
        'quantity_outstanding',
        'quantity_received',
        'quantity_return',
        'item_unit_cost',
        'subtotal_amount',
        'discount_percentage',
        'discount_amount',
        'subtotal_amount_after_discount',
        'purchase_order_item_creassing',
        'purchase_order_token',
    ];
}
