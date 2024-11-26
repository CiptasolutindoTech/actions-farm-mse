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
        if (!Schema::hasTable('ppob_topup_company')) {
            Schema::create('ppob_topup_company', function (Blueprint $table) {
                $table->id('ppob_topup_company_id');
                $table->integer('ppob_company_id')->nullable();
                $table->string('ppob_topup_company_no')->nullable();
                $table->string('ppob_topup_no')->nullable();
                $table->unsignedBigInteger('client_id')->nullable();
                $table->date('ppob_topup_company_date')->nullable();

                $table->string('ppob_topup_company_opening')->nullable();
                $table->string('ppob_topup_company_amount')->nullable();
                $table->string('ppob_topup_company_balance')->nullable();

                $table->string('ppob_topup_company_opening_cipta')->nullable();
                $table->string('ppob_topup_company_amount_cipta')->nullable();
                $table->string('ppob_topup_company_balance_cipta')->nullable();

                $table->tinyInteger('ppob_topup_company_status')->nullable();
                $table->tinyInteger('ppob_topup_company_verivied')->nullable()->comment('Apakah sudah cek di bossbiller');
                $table->char('token',36)->nullable();
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
        Schema::dropIfExists('ppob_topup_company');
    }
};
