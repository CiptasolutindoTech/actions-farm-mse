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
                $table->id('item_id'); // Primary Key
                $table->string('item_name', 255)->nullable(false); // Nama item
                $table->unsignedBigInteger('category_id'); // Foreign Key to 'categories'
                $table->unsignedBigInteger('unit_id'); // Foreign Key to 'units'
                $table->integer('stock')->default(0); // Stok barang
                $table->decimal('unit_cost', 10, 2)->nullable(false); // Harga beli
                $table->decimal('unit_price', 10, 2)->nullable(false); // Harga jual

                // Relasi ke tabel lain
                $table->foreign('category_id')->references('id')->on('categoris')->onUpdate('cascade')->onDelete('restrict');
                $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('restrict');

                $table->smallInteger('data_state')->default(0)->nullable();
                $table->unsignedBigInteger('created_id')->nullable();
                $table->unsignedBigInteger('updated_id')->nullable();
                $table->char('uuid', 36)->nullable();
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
