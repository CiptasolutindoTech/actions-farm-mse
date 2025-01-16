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
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->id('purchase_order_id');
            $table->unsignedBigInteger('supplier_id')->nullable()->default(0);
            $table->foreign('supplier_id')->references('supplier_id')->on('core_supplier')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('warehouse_id')->nullable()->default(0);
            $table->foreign('warehouse_id')->references('warehouse_id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('purchase_order_no',20)->nullable();
            $table->date('purchase_order_date')->nullable()->default(NULL);
            $table->string('payment_method',255)->nullable()->default(1);
            $table->date('purchase_order_shipment_date')->nullable()->default(NULL);
            $table->decimal('purchase_order_payment_terms',10,0)->nullable()->default(0);
            $table->text('purchase_order_remark')->nullable()->default(NULL);
            $table->decimal('total_item',10,2)->nullable()->default(0.00);
            $table->decimal('total_received_item',20,2)->nullable()->default(0.00);
            $table->decimal('subtotal_amount',20,2)->nullable()->default(0.00);
            $table->decimal('discount_percentage',5,2)->nullable()->default(0.00);
            $table->decimal('discount_amount',20,2)->nullable()->default(0.00);
            $table->decimal('ppn_in_percentage',5,2)->nullable()->default(0.00);
            $table->decimal('ppn_in_amount',20,2)->nullable()->default(0.00);
            $table->decimal('subtotal_after_ppn_in',20,2)->nullable()->default(0.00);
            $table->decimal('tax_percentage',5,2)->nullable()->default(0.00);
            $table->decimal('tax_amount',20,2)->nullable()->default(0.00);
            $table->decimal('total_amount',20,2)->nullable()->default(0.00);
            $table->decimal('down_payment_amount',20,2)->nullable()->default(0.00);
            $table->decimal('down_payment_amount_balance',20,2)->nullable()->default(0.00);
            $table->decimal('last_balance_amount',20,2)->nullable()->default(0.00);
            $table->unsignedBigInteger('purchase_order_type_id')->nullable()->default(0);
            $table->foreign('purchase_order_type_id')->references('purchase_order_type_id')->on('purchase_order_type')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order');
    }
};
