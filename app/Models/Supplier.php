<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_supplier';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'supplier_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_id',
        'supplier_code',
        'supplier_name',
        'supplier_address',
        'supplier_home_phone',
        'supplier_mobile_phone1',
        'supplier_mobile_phone2',
        'supplier_fax_number',
        'supplier_email',
        'supplier_contact_person',
        'supplier_bank_acct_name',
        'supplier_bank_acct_no',
        'supplier_tax_no',
        'supplier_npwp_no',
        'supplier_npwp_address',
        'supplier_payment_terms',
        'supplier_status',
        'supplier_remark',
        'amount_debt',
        'payable_account_id',
        'created_id',
        'created_at',
        'data_state',
        'updated_at',
    ];

    protected $casts = [
        'supplier_payment_terms' => 'decimal:0',
        'supplier_status' => 'decimal:0',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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

    /**
     * The relationship with the Branch model (if necessary).
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'branch_id');
    }
}
