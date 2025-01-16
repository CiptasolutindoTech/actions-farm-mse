<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('sales_order')) {
            Schema::create('sales_order', function (Blueprint $table) {
                $table->id('sales_order_id');
                $table->bigInteger('sales_order_type_id')->default(0);
                $table->integer('customer_id')->default(0);
                $table->integer('salesman_id')->default(0);
                $table->string('receipt_image', 500)->default('');
                $table->string('sales_order_no', 50)->default('');
                $table->integer('payment_method')->default(0)->comment('1 = Cash, 2 = Kredit');
                $table->string('purchase_order_no', 50)->default('0');
                $table->date('sales_order_date')->nullable();
                $table->date('sales_order_delivery_date')->nullable();
                $table->integer('sales_order_status')->default(0);
                $table->decimal('sales_order_over_limit', 20, 2)->default(0.00);
                $table->integer('sales_order_over_due_status')->default(0);
                $table->integer('purchase_order_status')->default(0);
                $table->integer('work_order_status')->default(0)->comment('0 : Draft, 1 : Processed');
                $table->integer('purchase_requisition_status')->default(0);
                $table->integer('sales_order_design_status')->default(0);
                $table->integer('sales_delivery_order_status')->default(0);
                $table->decimal('customer_credit_limit_balance', 20, 2)->default(0.00);
                $table->integer('sales_invoice_status')->default(0);
                $table->decimal('sales_invoice_last_balance', 20, 2)->default(0.00);
                $table->text('sales_order_remark')->nullable();
                $table->text('sales_order_over_remark')->nullable();
                $table->decimal('total_item', 10, 2)->default(0.00);
                $table->decimal('subtotal_before_discount', 20, 2)->default(0.00);
                $table->decimal('discount_percentage', 20, 2)->default(0.00);
                $table->decimal('discount_amount', 20, 2)->default(0.00);
                $table->decimal('subtotal_after_discount', 20, 2)->default(0.00);
                $table->decimal('ppn_out_percentage', 20, 2)->default(0.00);
                $table->decimal('ppn_out_amount', 20, 2)->default(0.00);
                $table->decimal('subtotal_after_ppn_out', 20, 2)->default(0.00);
                $table->decimal('sales_shipment_status', 1, 0)->default(0);
                $table->decimal('paid_amount', 20, 2)->default(0.00);
                $table->decimal('total_amount', 20, 2)->default(0.00);
                $table->decimal('last_balance', 20, 2)->default(0.00);
                $table->integer('counter_edited')->default(0);
                $table->integer('branch_id')->nullable();
                $table->integer('data_state')->default(0);
                $table->integer('created_id')->default(0);
                $table->timestamp('created_at')->nullable();
                $table->integer('approved')->default(0);
                $table->integer('approved_id')->default(0);
                $table->timestamp('approved_on')->nullable();
                $table->text('approved_remark')->nullable();
                $table->integer('closed')->default(0);
                $table->integer('closed_id')->default(0);
                $table->timestamp('closed_on')->nullable();
                $table->text('closed_remark')->nullable();
                $table->integer('voided_id')->default(0);
                $table->timestamp('voided_on')->nullable();
                $table->text('voided_remark')->nullable();
                $table->string('customer_no', 50)->default('');
                $table->timestamp('updated_at')->useCurrent();
                $table->softDeletesTz();
            });

            // Insert initial data into sales_order table (Optional)
            DB::table('sales_order')->insert([
                // You can insert initial data if required. For example:
                // ['sales_order_no' => 'SO123', 'customer_id' => 1, 'sales_order_date' => now(), 'total_amount' => 1000.00]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_order');
    }
};
