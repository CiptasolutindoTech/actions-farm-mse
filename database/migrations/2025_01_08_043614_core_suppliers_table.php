<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Html\Columns\Index;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('core_supplier')) {
            Schema::create('core_supplier', function (Blueprint $table) {
                $table->id('supplier_id')->index(); // Primary Key
                $table->integer('branch_id')->default(1); // Branch ID
                $table->string('supplier_code', 20)->default(''); // Supplier Code
                $table->string('supplier_name', 50)->default(''); // Supplier Name
                $table->text('supplier_address')->nullable(); // Supplier Address
                $table->string('supplier_home_phone', 200)->default(''); // Home Phone
                $table->string('supplier_mobile_phone1', 200)->default(''); // Mobile Phone 1
                $table->string('supplier_mobile_phone2', 200)->default(''); // Mobile Phone 2
                $table->string('supplier_fax_number', 200)->default(''); // Fax Number
                $table->string('supplier_email', 200)->default(''); // Email
                $table->string('supplier_contact_person', 50)->default(''); // Contact Person
                $table->string('supplier_bank_acct_name', 50)->default(''); // Bank Account Name
                $table->string('supplier_bank_acct_no', 30)->default(''); // Bank Account Number
                $table->string('supplier_tax_no', 30)->default(''); // Tax Number
                $table->string('supplier_npwp_no', 255)->nullable(); // NPWP Number
                $table->text('supplier_npwp_address')->nullable(); // NPWP Address
                $table->decimal('supplier_payment_terms', 10, 0)->default(0); // Payment Terms
                $table->decimal('supplier_status', 1, 0)->default(0)->comment('1 : Active, 0 : Suspended'); // Status
                $table->text('supplier_remark')->nullable(); // Remarks
                $table->integer('amount_debt')->default(0); // Amount Debt
                $table->integer('payable_account_id')->default(0); // Payable Account ID
                $table->integer('created_id')->default(0); // Created By
                $table->dateTime('created_at')->nullable(); // Created At
                $table->integer('data_state')->default(0); // Data State
                $table->timestamp('updated_at')->useCurrent(); // Updated At
                $table->softDeletesTz();

                $table->index('branch_id', 'FK_core_supplier_branch_id'); // Foreign Key Index
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_supplier');
    }
};
