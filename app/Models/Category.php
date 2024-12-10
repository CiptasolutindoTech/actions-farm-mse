<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $table = 'categoris';
    protected $primaryKey = 'category_id';
    public $timestamps = true;
    protected $fillable = [
        'category_name',
        'data_state',
    ];
}
