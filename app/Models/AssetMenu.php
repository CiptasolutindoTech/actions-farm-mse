<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMenu extends Model
{
    use HasFactory;
    protected $table        = 'asset_menu';
    protected $primaryKey   = 'asset_id';
 
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 
}
