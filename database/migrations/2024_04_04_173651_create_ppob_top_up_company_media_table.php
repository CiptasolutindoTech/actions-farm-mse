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
        if (!Schema::hasTable('ppob_topup_company_media')) {
        Schema::create('ppob_topup_company_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ppob_topup_company_id')->nullable();
            $table->unsignedBigInteger('ppob_topup_id')->nullable();
            $table->text('path')->nullable();
            $table->text('slug')->nullable();
            $table->char('token',36)->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->text('remark')->nullable();
            $table->text('title')->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
            $table->unsignedBigInteger('updated_id')->nullable();
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
        Schema::dropIfExists('ppob_topup_company_media');
    }
};
