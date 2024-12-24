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
        Schema::create('warehouse_location', function (Blueprint $table) {
            $table->increments('warehouse_location_id'); // AUTO_INCREMENT Primary Key
            $table->string('warehouse_location_code', 20)->default(''); // VARCHAR(20) DEFAULT ''
            $table->integer('province_id'); // INT DEFAULT NULL
            $table->integer('city_id'); // INT DEFAULT NULL
            $table->index('province_id', 'FK_warehouse_location_province_id');
            $table->index('city_id', 'FK_warehouse_location_city_id');
            $table->smallInteger('data_state')->default(0)->nullable();
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
        Schema::dropIfExists('warehouses');
    }
};
