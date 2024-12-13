<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id(); // Kolom id default (primary key)
            $table->unsignedBigInteger('item_id'); // Foreign key ke tabel items
            $table->string('medicine_type'); // Jenis Obat (misalnya Antibiotik, Vitamin)
            $table->string('dosage'); // Dosis obat
            $table->date('expiration_date'); // Tanggal Kadaluarsa
            
            // Menambahkan foreign key constraint
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            
            // Kolom audit
            $table->smallInteger('data_state')->default(0)->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
            $table->unsignedBigInteger('updated_id')->nullable();
            $table->unsignedBigInteger('deleted_id')->nullable();
            
            // Kolom timestamps (created_at, updated_at)
            $table->timestamps();
            
            // Kolom untuk soft delete
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat');
    }
};
