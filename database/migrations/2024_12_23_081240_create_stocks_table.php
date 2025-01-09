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
        Schema::create('inv_item_stock', function (Blueprint $table) {
            $table->id('item_stock_id');
            $table->unsignedBigInteger('goods_received_note_id')->default()->nullable();
            $table->unsignedBigInteger('goods_received_note_item_id')->default()->nullable();
            $table->date('item_stock_date')->nullable();
            $table->unsignedBigInteger('warehouse_id')->default(0);
            $table->foreign('warehouse_id')->references('warehouse_id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('category_id')->default(0);
            $table->foreign('category_id')->references('category_id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('item_id')->default(0);
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('unit_id')->default(5);
            $table->foreign('unit_id')->references('unit_id')->on('units')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('item_total',10,0)->default(0);
            $table->decimal('item_unit_cost',20,0)->default(0);
            $table->decimal('item_unit_price',20,0)->default(0);
            $table->unsignedBigInteger('item_unit_id_default')->default()->nullable();
            $table->unsignedBigInteger('item_default_quantity_unit')->default(0);
            $table->unsignedBigInteger('quantity_unit')->default(0);
            $table->unsignedBigInteger('item_weight_default')->default()->nullable();
            $table->string('item_weight_unit',200)->default()->nullable();
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_item_stock');
    }
};
