<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'obat';

    protected $primaryKey = 'id';

    /**
     * Kolom yang dapat diisi (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'medicine_type',
        'dosage',
        'expiration_date',
    ];

    // Properti casting untuk kolom tertentu
    protected $dates = ['created_at', 'updated_at', 'expiration_date'];


    /**
     * Mendefinisikan relasi dengan model Item
     * Setiap obat berhubungan dengan satu item di tabel items
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}
