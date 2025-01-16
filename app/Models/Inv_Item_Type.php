<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_Item_Type extends Model
{
    /** @use HasFactory<\Database\Factories\InvItemTypeFactory> */
    use HasFactory;
    protected $table = 'inv_item_type';
    protected $primaryKey = 'item_type_id';
    public $timestamps = true;
    protected $fillable = [
        'item_category_id',
        'item_type_name',
        'item_type_expired_time',
        'item_package_status',
        'item_unit_1',
        'item_quantity_default_1',
        'item_weight_1',
        'item_unit_2',
        'item_quantity_default_2',
        'item_weight_2',
        'item_unit_3',
        'item_quantity_default_3',
        'item_weight_3',
        'purchase_account_id',
        'purchase_return_account_id',
        'purchase_discount_account_id',
        'sales_account_id',
        'sales_return_account_id',
        'sales_discount_account_id',
        'inv_account_id',
        'inv_return_account_id',
        'inv_discount_account_id',
        'hpp_account_id',
        'hpp_amount',
    ];
}
