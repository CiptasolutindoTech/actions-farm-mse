<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpobTopupCompany extends Model
{
    use HasFactory,SoftDeletes;
    protected $table        = 'ppob_topup_company';
    protected $primaryKey   = '	ppob_topup_company_id';

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];
}