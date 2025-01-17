<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'item_id';

    // Hanya atribut ini yang dapat diisi melalui mass assignment
    protected $fillable = [
        'item_name',
        'category_id',
        'unit_id',
        'stock',
        'unit_cost',
        'unit_price',
        'data_state',
        'created_id',
        'updated_id',
        'deleted_id'
    ];

    // Relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    // Relasi dengan Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'unit_id');
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class, 'item_id', 'item_id');
    }

    public function obat()
    {
        return $this->hasMany(Unit::class, 'item_id', 'item_id');
    }
    public function stock()
    {
        return $this->hasMany(Stock::class, 'item_id', 'item_id');
    }

    // Mendeklarasikan kolom soft delete
    protected $dates = ['deleted_at'];
}
