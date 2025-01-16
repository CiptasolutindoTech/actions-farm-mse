<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesInvoiceItem extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sales_invoice_item';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'sales_invoice_item_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sales_invoice_id',
        'sales_order_id',
        'sales_delivery_note_id',
        'sales_delivery_note_item_id',
        'item_id',
        'item_type_id',
        'item_unit_id',
        'quantity',
        'item_unit_price',
        'item_unit_price_tax',
        'discount_A',
        'discount_B',
        'subtotal_price_A',
        'subtotal_price_B',
        'data_state',
        'created_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    // Example: Relationship with SalesInvoice
    public function salesInvoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'sales_invoice_id', 'sales_invoice_id');
    }
}
