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
        Schema::create('inv_item_type', function (Blueprint $table) {
            $table->id('item_type_id')->index();
            $table->unsignedBigInteger('item_category_id')->nullable()->default(NULL);
            $table->foreign('item_category_id')->references('item_category_id')->on('inv_item_category')->onDelete('cascade')->onUpdate('cascade');
            $table->string('item_type_name',250)->nullable()->default(NULL);
            $table->integer('item_type_expired_time')->nullable()->default(NULL);
            $table->integer('item_package_status')->nullable()->default(0)->comment('0 = warehouse-out, 1 = grading');
            $table->integer('item_unit_1')->nullable()->default(0);
            $table->integer('item_quantity_default_1')->nullable()->default(1);
            $table->integer('item_weight_1')->nullable()->default(1);
            $table->string('item_unit_2',250)->nullable()->default(NULL);
            $table->integer('item_quantity_default_2')->nullable()->default(1);
            $table->string('item_weight_2',250)->nullable()->default(NULL);
            $table->string('item_unit_3',250)->nullable()->default(NULL);
            $table->integer('item_quantity_default_3')->nullable()->default(1);
            $table->string('item_weight_3',250)->nullable()->default(NULL);
            $table->integer('purchase_account_id')->nullable()->default(NULL)->index();
            $table->integer('purchase_return_account_id')->nullable()->default(NULL)->index();
            $table->integer('purchase_discount_account_id')->nullable()->default(NULL)->index();
            $table->integer('sales_account_id')->nullable()->default(NULL)->index();
            $table->integer('sales_return_account_id')->nullable()->default(NULL)->index();
            $table->integer('sales_discount_account_id')->nullable()->default(NULL)->index();
            $table->integer('inv_account_id')->nullable()->default(NULL)->index();
            $table->integer('inv_return_account_id')->nullable()->default(NULL)->index();
            $table->integer('inv_discount_account_id')->nullable()->default(NULL)->index();
            $table->integer('hpp_account_id')->nullable()->default(NULL);
            $table->integer('hpp_amount')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_item_type');
    }
};
