<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    public $timestamps = true;
    protected $fillable = [
        'category_name',
        'data_state',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'category_id');
    }
    public function stock()
    {
        return $this->hasMany(Stock::class, 'category_id', 'category_id');
    }
}
