<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'feeds';

    protected $primaryKey = 'feed_id'; // Ganti dengan nama kolom primary key yang sebenarnya

    /**
     * Kolom yang dapat diisi (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'feed_type',
        'expiration_date',
    ];

    /**
     * Kolom yang harus dimutakhirkan secara otomatis oleh Eloquent.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'expiration_date'];


    /**
     * Relasi dengan model Item.
     * Feed memiliki satu Item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}
