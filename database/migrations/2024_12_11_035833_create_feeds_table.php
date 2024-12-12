<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedsTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel feeds.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->id('feed_id');
            // Kolom item_id sebagai Primary Key dan Foreign Key
            $table->unsignedBigInteger('item_id');
            

            // Kolom feed_type dengan enum untuk Herbivore, Carnivore, Omnivore
            $table->enum('feed_type', ['Herbivore', 'Carnivore', 'Omnivore']);

            // Kolom expiration_date bertipe date
            $table->date('expiration_date');

            // Timestamps untuk created_at dan updated_at
            $table->timestamps();

            // Soft Deletes (hapus data secara lembut)
            $table->softDeletesTz();

            // Menambahkan foreign key constraint
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Balikkan perubahan yang dilakukan oleh migrasi ini.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeds');
    }
}
