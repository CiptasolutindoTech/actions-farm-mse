<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrderItem extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table associated with the model
    protected $table = 'sales_order_item';

    // Define the primary key (if it's different from the default 'id')
    protected $primaryKey = 'sales_order_item_id';

    // Disable timestamps if you don't want Laravel to manage created_at and updated_at
    public $timestamps = true;

    // Define the attributes that are mass assignable
    protected $fillable = [
        'sales_order_id',
        'item_category_id',
        'item_type_id',
        'quantity',
        'quantity_delivered',
        'quantity_shipped',
        'quantity_planned',
        'quantity_outstanding',
        'quantity_received',
        'quantity_ordered',
        'quantity_cavity',
        'quantity_minimum',
        'quantity_resulted',
        'sales_order_item_status',
        'item_substance_price',
        'item_unit_id',
        'item_unit_price',
        'item_unit_price_adds',
        'purchase_requisition_status',
        'purchase_order_status',
        'work_order_status',
        'sales_delivery_order_status',
        'sales_delivery_note_status',
        'sales_invoice_status',
        'quantity_minimum_status',
        'subtotal_amount',
        'subtotal_additional_amount',
        'subtotal_item_amount',
        'sales_order_no',
        'sales_order_status',
        'discount_percentage_item',
        'discount_percentage_item_b',
        'discount_amount_item',
        'discount_amount_item_b',
        'subtotal_after_discount_item_a',
        'subtotal_after_discount_item_b',
        'total_price_after_ppn_amount',
        'ppn_amount_item',
        'record_id',
        'data_state',
        'created_id',
    ];

    // Define the attributes that should be cast to specific types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // You can define any relationships if applicable, for example:
    // public function salesOrder()
    // {
    //     return $this->belongsTo(SalesOrder::class, 'sales_order_id');
    // }

}
