<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_Item_Category extends Model
{
    /** @use HasFactory<\Database\Factories\InvItemCategoryFactory> */
    use HasFactory;
    protected $table = 'inv_item_category';
    protected $primaryKey = 'item_category_id';
    public $timestamps = true;
    protected $fillable = [
        'item_category_name',
    ];
}
