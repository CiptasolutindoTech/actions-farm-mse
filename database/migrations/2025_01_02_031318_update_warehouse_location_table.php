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
        Schema::table('warehouse_location', function (Blueprint $table) {
            // Memeriksa apakah kolom 'province_id' ada sebelum mencoba menghapusnya
            if (Schema::hasColumn('warehouse_location', 'province_id')) {
                $table->dropColumn('province_id');
            }

            // Memeriksa apakah kolom 'city_id' ada sebelum mencoba menghapusnya
            if (Schema::hasColumn('warehouse_location', 'city_id')) {
                $table->dropColumn('city_id');
            }

            // Menambahkan kolom 'description'
            $table->text('description')->nullable()->after('warehouse_location_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warehouse_location', function (Blueprint $table) {
            // Menambahkan kembali kolom 'province_id' dan 'city_id'
            $table->integer('province_id')->nullable()->after('warehouse_location_code');
            $table->integer('city_id')->nullable()->after('province_id');

            // Menghapus kolom 'description' jika rollback
            $table->dropColumn('description');
        });
    }
};
