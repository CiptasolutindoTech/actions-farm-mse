<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cage extends Model
{
    /** @use HasFactory<\Database\Factories\CageFactory> */
    use HasFactory;
    protected $table = 'cages';
    protected $primaryKey = 'cage_id';
    public $timestamps = true;
    protected $fillable = [
        'cage_name',
        'location',
        'capacity',
        'animal_id',
    ];
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Hewan::class, 'animal_id', 'animal_id');
    }
}
