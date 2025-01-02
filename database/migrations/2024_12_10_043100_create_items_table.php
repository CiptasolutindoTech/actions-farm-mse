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
        if (!Schema::hasTable('items')) {
            Schema::create('items', function (Blueprint $table) {
                $table->id('item_id')->index('item_id');
                $table->string('item_name');
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('unit_id');
                $table->integer('stock')->default(0);
                $table->decimal('unit_cost', 10, 2); // Harga beli
                $table->decimal('unit_price', 10, 2); // Harga jual

                // Foreign keys
                $table->foreign('category_id')->references('category_id')->on('categoris')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('unit_id')->references('unit_id')->on('units')->onDelete('cascade')->onUpdate('cascade');

                $table->smallInteger('data_state')->default(0)->nullable();
                $table->unsignedBigInteger('created_id')->nullable();
                $table->unsignedBigInteger('updated_id')->nullable();
                $table->unsignedBigInteger('deleted_id')->nullable();
                $table->timestamps();
                $table->softDeletesTz();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
