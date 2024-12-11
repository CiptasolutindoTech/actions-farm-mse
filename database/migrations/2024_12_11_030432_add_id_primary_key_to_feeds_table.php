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
        Schema::table('feeds', function (Blueprint $table) {
            // Hapus foreign key constraint yang bergantung pada item_id
            $table->dropForeign(['item_id']);
            
            // Hapus primary key dari item_id
            $table->dropPrimary('feeds_item_id_primary'); // Pastikan nama constraint sesuai
            
            // Tambahkan kolom id sebagai primary key
            $table->bigIncrements('id')->first(); // Tambahkan kolom id sebagai primary key pertama
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feeds', function (Blueprint $table) {
            // Hapus kolom id
            $table->dropColumn('id');
            
            // Tambahkan kembali primary key pada item_id
            $table->primary('item_id');
            
            // Tambahkan kembali foreign key constraint
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade');
        });
    }
};
