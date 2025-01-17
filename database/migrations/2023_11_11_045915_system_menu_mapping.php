<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('system_menu_mapping')) {
            Schema::create('system_menu_mapping', function (Blueprint $table) {
                $table->id('menu_mapping_id');
                $table->integer('user_group_id')->nullable();
                $table->string('id_menu')->nullable();
                $table->foreign('id_menu')->references('id_menu')->on('system_menu')->onUpdate('cascade')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletesTz();
            });
             // Insert admin user
            DB::table('system_menu_mapping')->insert([
                ['user_group_id' => 1,'id_menu' => 1  ],
                ['user_group_id' => 1,'id_menu' => 10 ],
                ['user_group_id' => 1,'id_menu' => 2  ],
                ['user_group_id' => 1,'id_menu' => 21  ],
                ['user_group_id' => 1,'id_menu' => 3  ],
                ['user_group_id' => 1,'id_menu' => 31  ],
                ['user_group_id' => 1,'id_menu' => 32  ],
                ['user_group_id' => 1,'id_menu' => 322  ],
                ['user_group_id' => 1,'id_menu' => 3222  ],
                ['user_group_id' => 1,'id_menu' => 33  ],
                ['user_group_id' => 1,'id_menu' => 333  ],
                ['user_group_id' => 1,'id_menu' => 34  ],
                ['user_group_id' => 1,'id_menu' => 344  ],
                ['user_group_id' => 1,'id_menu' => 35  ],
                ['user_group_id' => 1,'id_menu' => 4  ],
                ['user_group_id' => 1,'id_menu' => 5  ],
                ['user_group_id' => 1,'id_menu' => 51 ],
                ['user_group_id' => 1,'id_menu' => 6 ],
                ['user_group_id' => 1,'id_menu' => 7 ],
                ['user_group_id' => 1,'id_menu' => 71 ],
                ['user_group_id' => 1,'id_menu' => 72 ],
                ['user_group_id' => 1,'id_menu' => 73  ],
                ['user_group_id' => 1,'id_menu' => 74 ],
                ['user_group_id' => 1,'id_menu' => 75 ],
                ['user_group_id' => 1,'id_menu' => 76 ],
                ['user_group_id' => 1,'id_menu' => 77 ],
                ['user_group_id' => 1,'id_menu' => 8 ],
                ['user_group_id' => 1,'id_menu' => 81 ],
                ['user_group_id' => 1,'id_menu' => 81 ],
                ['user_group_id' => 1,'id_menu' => 82 ],
                ['user_group_id' => 1,'id_menu' => 83 ],
                ['user_group_id' => 1,'id_menu' => 84 ],
                ['user_group_id' => 1,'id_menu' => 844 ],
                ['user_group_id' => 1,'id_menu' => 85 ],
                ['user_group_id' => 1,'id_menu' => 86 ],
                ['user_group_id' => 1,'id_menu' => 866 ],
                ['user_group_id' => 1,'id_menu' => 87 ],
                ['user_group_id' => 1,'id_menu' => 88 ],
                ['user_group_id' => 1,'id_menu' => 89 ],
                ['user_group_id' => 1,'id_menu' => 9 ],
                ['user_group_id' => 1,'id_menu' => 91 ],
                ['user_group_id' => 1,'id_menu' => 92 ],
                ['user_group_id' => 1,'id_menu' => 93 ],
                ['user_group_id' => 1,'id_menu' => 95 ],
                ['user_group_id' => 1,'id_menu' => 96 ],
                ['user_group_id' => 1,'id_menu' => 94 ],
                ['user_group_id' => 1,'id_menu' => 97 ],
                ['user_group_id' => 1,'id_menu' => 98 ],
                ['user_group_id' => 1,'id_menu' => 99 ],
                ['user_group_id' => 1,'id_menu' => 911 ],
                ['user_group_id' => 1,'id_menu' => 11 ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('system_menu_mapping');
    }
};
