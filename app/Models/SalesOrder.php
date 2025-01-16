<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table associated with the model
    protected $table = 'sales_order';

    // Define the primary key (if it's different from the default 'id')
    protected $primaryKey = 'sales_order_id';

    // Disable timestamps if you don't want Laravel to manage created_at and updated_at
    public $timestamps = true;

    // Define the attributes that are mass assignable
    protected $fillable = [
        'sales_order_type_id',
        'customer_id',
        'salesman_id',
        'receipt_image',
        'sales_order_no',
        'payment_method',
        'purchase_order_no',
        'sales_order_date',
        'sales_order_delivery_date',
        'sales_order_status',
        'sales_order_over_limit',
        'sales_order_over_due_status',
        'purchase_order_status',
        'work_order_status',
        'purchase_requisition_status',
        'sales_order_design_status',
        'sales_delivery_order_status',
        'customer_credit_limit_balance',
        'sales_invoice_status',
        'sales_invoice_last_balance',
        'sales_order_remark',
        'sales_order_over_remark',
        'total_item',
        'subtotal_before_discount',
        'discount_percentage',
        'discount_amount',
        'subtotal_after_discount',
        'ppn_out_percentage',
        'ppn_out_amount',
        'subtotal_after_ppn_out',
        'sales_shipment_status',
        'paid_amount',
        'total_amount',
        'last_balance',
        'counter_edited',
        'branch_id',
        'data_state',
        'created_id',
        'approved',
        'approved_id',
        'approved_on',
        'approved_remark',
        'closed',
        'closed_id',
        'closed_on',
        'closed_remark',
        'voided_id',
        'voided_on',
        'voided_remark',
        'customer_no',
    ];

    // Define the attributes that should be cast to specific types
    protected $casts = [
        'sales_order_date' => 'date',
        'sales_order_delivery_date' => 'date',
        'approved_on' => 'datetime',
        'closed_on' => 'datetime',
        'voided_on' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optionally, you can define any relationships here, for example:
    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class, 'customer_id');
    // }
}
