<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Order extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseOrderFactory> */
    use HasFactory;
    protected $table = 'purchase_order';
    protected $primaryKey = 'purchase_order_id';
    public $timestamps = true;
    protected $fillable = [
        'supplier_id',
        'warehouse_id',
        'purchase_order_no',
        'purchase_order_date',
        'payment_method',
        'purchase_order_shipment_date',
        'purchase_order_payment_terms',
        'purchase_order_remark',
        'total_item',
        'total_received_item',
        'subtotal_amount',
        'discount_percentage',
        'discount_amount',
        'ppn_in_percentage',
        'ppn_in_amount',
        'subtotal_after_ppn_in',
        'tax_percentage',
        'tax_amount',
        'total_amount',
        'down_payment_amount',
        'down_payment_amount_balance',
        'last_balance_amount',
        'purchase_order_type_id',
    ];
}
