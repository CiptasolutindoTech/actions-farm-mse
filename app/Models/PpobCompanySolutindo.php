<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpobCompanySolutindo extends Model
{
    use HasFactory,SoftDeletes;
    protected $connection = 'mysql1';

    protected $table        = 'ppob_company';
    protected $primaryKey   = 'ppob_company_id';

     protected $guarded = [
         'created_at',
         'updated_at',
     ];
     protected $casts = [
        'ppob_company_database' => 'encrypted',
        'ppob_company_apikey' => 'encrypted',
        'ppob_company_secretkey' => 'encrypted'
    ];
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array
      */
     protected $hidden = [
     ];

}
