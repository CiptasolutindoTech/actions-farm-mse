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
        if (!Schema::hasTable('medicines')) {
            Schema::create('medicines', function (Blueprint $table) {
                $table->id('Item_ID'); // Primary Key

                // Kolom lainnya
                $table->string('Medicine_Type', 255)->nullable(false); // Tipe obat
                $table->string('Dosage', 255)->nullable(false); // Dosis
                $table->date('Expiration_Date')->nullable(false); // Tanggal kedaluwarsa

                // Foreign Key (gunakan ID yang sama sebagai primary key dan foreign key)
                $table->foreign('Item_ID')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');

                // Metadata tambahan
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
        Schema::dropIfExists('medicines');
    }
};
