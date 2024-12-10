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
        Schema::create('feed', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->primary();
            $table->foreign('item_id')->references('id')->on('item')->onUpdate('cascade')->onDelete('cascade');
            $table->string('feed_type')->nullable();
            $table->date('expiration_date')->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
            $table->unsignedBigInteger('updated_id')->nullable();
            $table->unsignedBigInteger('deleted_id')->nullable();
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed');
    }
};
