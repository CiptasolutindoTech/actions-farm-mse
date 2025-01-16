<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('sales_invoice')) {
            Schema::create('sales_invoice', function (Blueprint $table) {
                $table->bigIncrements('sales_invoice_id');
                $table->integer('branch_id')->default(0);
                $table->integer('warehouse_id')->default(0);
                $table->integer('customer_id')->default(0);
                $table->bigInteger('sales_order_id')->default(0);
                $table->bigInteger('sales_delivery_note_id')->default(0);
                $table->integer('collection_method_account_id')->default(0);
                $table->integer('services_income_id')->default(0);
                $table->string('sales_invoice_no', 255)->nullable();
                $table->string('sales_invoice_reference_no', 30)->default('');
                $table->date('sales_invoice_date')->nullable();
                $table->date('sales_invoice_due_date')->nullable();
                $table->text('sales_invoice_remark')->nullable();
                $table->decimal('sales_invoice_status', 1, 0)->default(0)->comment('0 = draft, 1 = closed');
                $table->decimal('services_income_amount', 20, 2)->default(0.00);
                $table->decimal('subtotal_item', 10, 2)->default(0.00);
                $table->integer('subtotal_amount')->default(0);
                $table->integer('subtotal_before_discount')->default(0);
                $table->decimal('discount_percentage', 10, 2)->default(0.00);
                $table->integer('discount_amount')->default(0);
                $table->decimal('return_status', 1, 0)->default(0);
                $table->integer('subtotal_after_discount')->default(0);
                $table->decimal('tax_percentage', 10, 2)->default(0.00);
                $table->decimal('tax_amount', 20, 2)->default(0.00);
                $table->string('goods_received_note_no', 255)->nullable();
                $table->string('faktur_tax_no', 255)->nullable();
                $table->integer('buyers_acknowledgment_id')->default(0);
                $table->string('buyers_acknowledgment_no', 255);
                $table->string('ttf_no', 255);
                $table->integer('kwitansi_status');
                $table->integer('total_amount')->default(0);
                $table->integer('paid_amount')->default(0);
                $table->integer('owing_amount')->default(0);
                $table->integer('shortover_amount')->default(0);
                $table->integer('last_balance')->default(0);
                $table->integer('total_discount_amount')->default(0);
                $table->integer('paid_discount_amount')->default(0);
                $table->integer('owing_discount_amount')->default(0);
                $table->integer('shortover_discount_amount')->default(0);
                $table->integer('discount_last_balance')->default(0);
                $table->integer('cash_advance_amount')->default(0);
                $table->integer('change_amount')->default(0);
                $table->decimal('sales_return_amount', 20, 2)->default(0.00);
                $table->date('sales_collection_date')->nullable();
                $table->string('sales_invoice_token', 250)->nullable();
                $table->string('sales_invoice_token_void', 250)->nullable();
                $table->integer('voided_id')->default(0);
                $table->dateTime('voided_on')->nullable();
                $table->text('voided_remark')->nullable();
                $table->decimal('data_state', 1, 0)->default(0);
                $table->integer('created_id')->default(0);
                $table->dateTime('created_at')->nullable();
                $table->timestamp('updated_at')->useCurrent();
                $table->softDeletesTz();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoice');
    }
};
