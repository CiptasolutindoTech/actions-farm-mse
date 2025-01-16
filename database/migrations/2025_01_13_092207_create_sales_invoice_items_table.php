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
        if (!Schema::hasTable('sales_invoice_item')) {
            Schema::create('sales_invoice_item', function (Blueprint $table) {
                $table->bigIncrements('sales_invoice_item_id');
                $table->bigInteger('sales_invoice_id')->default(0);
                $table->bigInteger('sales_order_id')->default(0);
                $table->bigInteger('sales_delivery_note_id')->default(0);
                $table->bigInteger('sales_delivery_note_item_id')->default(0);
                $table->bigInteger('item_id')->default(0);
                $table->integer('item_type_id')->nullable();
                $table->bigInteger('item_unit_id')->default(0);
                $table->integer('quantity')->default(0);
                $table->integer('item_unit_price')->default(0);
                $table->integer('item_unit_price_tax')->default(0);
                $table->integer('discount_A')->default(0);
                $table->integer('discount_B')->default(0);
                $table->integer('subtotal_price_A')->default(0);
                $table->integer('subtotal_price_B')->default(0);
                $table->integer('data_state')->default(0);
                $table->integer('created_id')->nullable();
                $table->dateTime('created_at')->nullable();
                $table->timestamp('updated_at')->useCurrent();
                $table->softDeletesTz();

                $table->index('sales_invoice_item_id', 'sales_invoice_item_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoice_item');
    }
};
