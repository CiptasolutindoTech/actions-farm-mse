<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesInvoice extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sales_invoice';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'sales_invoice_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_id',
        'warehouse_id',
        'customer_id',
        'sales_order_id',
        'sales_delivery_note_id',
        'collection_method_account_id',
        'services_income_id',
        'sales_invoice_no',
        'sales_invoice_reference_no',
        'sales_invoice_date',
        'sales_invoice_due_date',
        'sales_invoice_remark',
        'sales_invoice_status',
        'services_income_amount',
        'subtotal_item',
        'subtotal_amount',
        'subtotal_before_discount',
        'discount_percentage',
        'discount_amount',
        'return_status',
        'subtotal_after_discount',
        'tax_percentage',
        'tax_amount',
        'goods_received_note_no',
        'faktur_tax_no',
        'buyers_acknowledgment_id',
        'buyers_acknowledgment_no',
        'ttf_no',
        'kwitansi_status',
        'total_amount',
        'paid_amount',
        'owing_amount',
        'shortover_amount',
        'last_balance',
        'total_discount_amount',
        'paid_discount_amount',
        'owing_discount_amount',
        'shortover_discount_amount',
        'discount_last_balance',
        'cash_advance_amount',
        'change_amount',
        'sales_return_amount',
        'sales_collection_date',
        'sales_invoice_token',
        'sales_invoice_token_void',
        'voided_id',
        'voided_on',
        'voided_remark',
        'data_state',
        'created_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'sales_invoice_date' => 'date',
        'sales_invoice_due_date' => 'date',
        'sales_collection_date' => 'date',
        'voided_on' => 'datetime',
    ];

    /**
     * Relationships
     */

    // Example: Relationship with SalesInvoiceItem
    public function items()
    {
        return $this->hasMany(SalesInvoiceItem::class, 'sales_invoice_id', 'sales_invoice_id');
    }
}
