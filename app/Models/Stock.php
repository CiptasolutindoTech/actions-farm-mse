<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;
    protected $table = 'inv_item_stock';
    protected $primaryKey = 'item_stock_id';
    public $timestamps = true;
    protected $fillable = [
        'goods_received_note_id',
        'goods_received_note_item_id',
        'item_stock_date',
        'warehouse_id',
        'item_category_id ',
        'item_id ',
        'item_unit_id ',
        'item_total ',
        'item_unit_cost ',
        'item_unit_price ',
        'item_unit_id_default ',
        'item_default_quantity_unit ',
        'quantity_unit',
        'item_weight_default ',
        'item_weight_unit ',
    ];

}
