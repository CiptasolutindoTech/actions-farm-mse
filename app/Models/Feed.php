<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel di database.
     *
     * @var string
     */
    protected $table = 'feeds';

    /**
     * Primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'item_id';

    /**
     * Primary key bukan incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Tipe data primary key.
     *
     * @var string
     */
    protected $keyType = 'unsignedBigInteger';

    /**
     * Kolom-kolom yang dapat diisi (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'feed_type',
        'expiration_date',
    ];

    /**
     * Format tanggal otomatis.
     *
     * @var string
     */
    protected $dates = ['deleted_at', 'expiration_date'];

    /**
     * Relasi dengan tabel `items`.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}
