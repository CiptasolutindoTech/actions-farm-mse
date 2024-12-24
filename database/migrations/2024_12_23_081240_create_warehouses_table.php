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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('warehouse_id');
            $table->integer('warehouse_location_id')->nullable();
            $table->string('warehouse_code', 20)->default('');
            $table->string('warehouse_type', 10)->nullable();
            $table->string('warehouse_name', 50)->default('');
            $table->text('warehouse_address')->nullable();
            $table->string('warehouse_phone', 50)->nullable();
            $table->text('warehouse_remark')->nullable();
            $table->decimal('data_state', 1, 0)->default(0);
            $table->integer('created_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->timestamp('updated_at')->useCurrent();
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
