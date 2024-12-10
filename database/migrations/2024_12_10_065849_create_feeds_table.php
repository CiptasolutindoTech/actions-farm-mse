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
        Schema::create('feeds', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->primary(); // Primary Key and Foreign Key
            $table->enum('feed_type', ['Herbivore', 'Carnivore', 'Omnivore']);
            $table->date('expiration_date');
            $table->timestamps();
            $table->softDeletesTz();

            // Set foreign key constraint
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeds');
    }
};
