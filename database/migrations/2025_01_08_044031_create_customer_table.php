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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id'); // AUTO_INCREMENT Primary Key
            $table->string('customer_code', 255)->nullable(); // VARCHAR(255) DEFAULT NULL
            $table->string('customer_name', 255)->nullable(); // VARCHAR(255) DEFAULT NULL
            $table->string('customer_tax_no', 255)->nullable(); // VARCHAR(255) DEFAULT NULL
            $table->string('customer_address', 255)->nullable(); // VARCHAR(255) DEFAULT NULL
            $table->string('customer_email', 255)->nullable(); // VARCHAR(255) DEFAULT NULL
            $table->string('customer_fax_number', 255)->nullable(); // VARCHAR(255) DEFAULT NULL
            $table->string('customer_contact_person', 255)->nullable(); // VARCHAR(255) DEFAULT NULL
            $table->decimal('customer_payment_terms', 10, 0)->nullable(); // DECIMAL(10,0) DEFAULT NULL
            $table->text('customer_remark')->nullable(); // TEXT DEFAULT NULL
            $table->integer('debt_limit')->default(0); // INT DEFAULT '0'
            $table->integer('amount_debt')->default(0); // INT DEFAULT '0'
            $table->integer('remaining_limit')->default(0); // INT DEFAULT '0'
            $table->integer('from_store')->default(0); // INT DEFAULT '0'
            $table->integer('data_state')->default(0); // INT DEFAULT '0'
            $table->unsignedBigInteger('updated_id')->nullable(); // INT DEFAULT NULL
            $table->unsignedBigInteger('created_id')->nullable(); // INT DEFAULT NULL
            $table->datetime('created_at')->nullable(); // DATETIME DEFAULT NULL
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP')); // TIMESTAMP DEFAULT CURRENT_TIMESTAMP

            $table->index('customer_id'); // Add index for customer_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
