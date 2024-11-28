<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = ['id']; // Everything is mass-assignable except for 'id'
    // Allow mass assignment for the 'name' attribute
    protected $fillable = ['name','code'];

    // If you're using timestamps (created_at, updated_at), ensure that the $timestamps property is not set to false
    // protected $timestamps = false; // Uncomment this line if you are not using timestamps
}
