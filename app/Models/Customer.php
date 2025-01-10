<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'customer_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_code',
        'customer_name',
        'customer_tax_no',
        'customer_address',
        'customer_email',
        'customer_fax_number',
        'customer_contact_person',
        'customer_payment_terms',
        'customer_remark',
        'debt_limit',
        'amount_debt',
        'remaining_limit',
        'from_store',
        'data_state',
        'updated_id',
        'created_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
