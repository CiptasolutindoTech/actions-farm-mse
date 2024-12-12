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

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'item_id',
        'medicine_type',
        'dosage',
        'expiration_date',
    ];

    // Kolom yang akan dianggap sebagai timestamp soft delete
    protected $dates = ['created_at','updated_at','deleted_at', 'expiration_date'];

    /**
     * Mendefinisikan relasi dengan model Item
     * Setiap obat berhubungan dengan satu item di tabel items
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }

    // Opsional: Menambahkan aksesors dan mutators jika diperlukan
    // Contoh, untuk format tanggal kadaluarsa
}
