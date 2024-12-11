<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Feed::create([
            'item_id' => 1, // Sesuaikan dengan item_id yang ada
            'feed_type' => 'Herbivore',
            'expiration_date' => '2024-12-11',
        ]);
        
    }
}
