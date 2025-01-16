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
        if (!Schema::hasTable('sales_order_item')) {
            Schema::create('sales_order_item', function (Blueprint $table) {
                $table->bigIncrements('sales_order_item_id');
                $table->bigInteger('sales_order_id')->default(0);
                $table->integer('item_category_id')->nullable();
                $table->integer('item_type_id')->default(0);
                $table->decimal('quantity', 10, 2)->default(0.00);
                $table->decimal('quantity_delivered', 10, 2)->default(0.00);
                $table->decimal('quantity_shipped', 10, 2)->default(0.00);
                $table->decimal('quantity_planned', 10, 2)->default(0.00);
                $table->decimal('quantity_outstanding', 10, 2)->default(0.00);
                $table->decimal('quantity_received', 10, 2)->default(0.00);
                $table->decimal('quantity_ordered', 10, 2)->default(0.00);
                $table->decimal('quantity_cavity', 10, 2)->default(0.00);
                $table->decimal('quantity_minimum', 10, 2)->default(0.00);
                $table->decimal('quantity_resulted', 10, 2)->default(0.00);
                $table->integer('sales_order_item_status')->default(0);
                $table->decimal('item_substance_price', 10, 2)->default(0.00);
                $table->integer('item_unit_id')->nullable();
                $table->decimal('item_unit_price', 10, 2)->default(0.00);
                $table->decimal('item_unit_price_adds', 10, 2)->default(0.00);
                $table->integer('purchase_requisition_status')->default(0);
                $table->integer('purchase_order_status')->default(0);
                $table->integer('work_order_status')->default(0);
                $table->integer('sales_delivery_order_status')->default(0);
                $table->integer('sales_delivery_note_status')->default(0);
                $table->integer('sales_invoice_status')->default(0);
                $table->integer('quantity_minimum_status')->default(0);
                $table->decimal('subtotal_amount', 20, 2)->default(0.00);
                $table->decimal('subtotal_additional_amount', 20, 2)->default(0.00);
                $table->decimal('subtotal_item_amount', 20, 2)->default(0.00);
                $table->string('sales_order_no', 50)->default('');
                $table->integer('sales_order_status')->default(0);
                $table->decimal('discount_percentage_item', 10, 2)->default(0.00);
                $table->decimal('discount_percentage_item_b', 10, 2)->nullable();
                $table->decimal('discount_amount_item', 10, 2)->default(0.00);
                $table->decimal('discount_amount_item_b', 10, 2)->nullable();
                $table->decimal('subtotal_after_discount_item_a', 10, 2)->default(0.00);
                $table->decimal('subtotal_after_discount_item_b', 10, 2)->nullable();
                $table->decimal('total_price_after_ppn_amount', 20, 2)->default(0.00);
                $table->decimal('ppn_amount_item', 20, 2)->default(0.00);
                $table->bigInteger('record_id')->default(0);
                $table->integer('data_state')->default(0);
                $table->integer('created_id')->default(0);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->useCurrent();
                $table->softDeletesTz();
            });

            // Insert initial data into sales_order_item table (Optional)
            DB::table('sales_order_item')->insert([
                // You can insert initial data if required. For example:
                // ['sales_order_id' => 1, 'item_category_id' => 1, 'quantity' => 100, 'subtotal_amount' => 1000.00]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_order_item');
    }
};
