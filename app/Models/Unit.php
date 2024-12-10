<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id']; // Everything is mass-assignable except for 'id'
    // Allow mass assignment for the 'name' attribute
    protected $fillable = ['name','code'];

    // Kolom untuk soft delete
    protected $dates = ['deleted_at'];
    // If you're using timestamps (created_at, updated_at), ensure that the $timestamps property is not set to false
    // protected $timestamps = false; // Uncomment this line if you are not using timestamps

    public function items()
    {
        return $this->hasMany(Item::class, 'unit_id', 'id');
    }
}
