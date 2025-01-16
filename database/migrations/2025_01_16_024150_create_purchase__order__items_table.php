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
        Schema::create('purchase_order_item', function (Blueprint $table) {
            $table->id('purchase_order_item_id');
            $table->unsignedBigInteger('purchase_order_id')->nullable()->default(0);
            $table->foreign('purchase_order_id')->references('purchase_order_id')->on('purchase_order')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('purchase_requisition_id')->nullable()->default(0);
            $table->unsignedBigInteger('purchase_requisition_item_id')->nullable()->default(0);
            $table->integer('item_category_id')->nullable()->default(0);
            $table->integer('item_unit_id')->nullable()->default(0);
            $table->unsignedBigInteger('item_type_id')->nullable()->default(0);
            $table->foreign('item_type_id')->references('item_type_id')->on('inv_item_type')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('quantity',10,0)->nullable()->default(0);
            $table->decimal('quantity_outstanding',10,0)->nullable()->default(0);
            $table->decimal('quantity_received',10,0)->nullable()->default(0);
            $table->decimal('quantity_return',10,0)->nullable()->default(0);
            $table->decimal('item_unit_cost',20,0)->nullable()->default(0);
            $table->decimal('subtotal_amount',20,0)->nullable()->default(0);
            $table->decimal('discount_percentage',5,0)->nullable()->default(0);
            $table->decimal('discount_amount',20,0)->nullable()->default(0);
            $table->decimal('subtotal_amount_after_discount',20,0)->nullable()->default(0);
            $table->string('purchase_order_item_creassing',250)->nullable()->default();
            $table->string('purchase_order_token',250)->index()->nullable()->default();
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_item');
    }
};
