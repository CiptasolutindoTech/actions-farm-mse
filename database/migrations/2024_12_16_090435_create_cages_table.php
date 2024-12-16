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
        Schema::create('cages', function (Blueprint $table) {
            $table->id('cage_id');
            $table->string('cage_name');
            $table->string('location');
            $table->unsignedBigInteger('capacity');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('animal_ID')->on('animals')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cages');
    }
};
