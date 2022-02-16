<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
        [
            'name' => 'アウター',
            'price' => 10000,
            'is_selling' => 1,
            'information' => 'アウターです。',
            'shop_id' => 1,
            'item_category_id' =>1,
            'image1' => 1,
        ],
        [
            'name' => 'コート',
            'price' => 30000,
            'is_selling' => 1,
            'information' => 'コートです。',
            'shop_id' => 1,
            'item_category_id' =>2,
            'image1' => 2,
        ],
        
     ]);
    }
}
