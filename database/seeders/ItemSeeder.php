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
            'sort_order' => 2,
            'shop_id' => 1,
            'item_category_id' =>1,
            'image1' => 1,
            'image2' => 2,
            'image3' => 1,
            'image4' => 2,
        ],
        [
            'name' => 'コート',
            'price' => 30000,
            'is_selling' => 1,
            'information' => 'コートです。',
            'sort_order' => 2,
            'shop_id' => 1,
            'item_category_id' =>2,
            'image1' => 2,
            'image2' => 2,
            'image3' => 4,
            'image4' => 5,
        ],
        [
            'name' => 'コート',
            'price' => 300000,
            'is_selling' => 1,
            'information' => 'コートです。',
            'sort_order' => 2,
            'shop_id' => 2,
            'item_category_id' =>2,
            'image1' => 2,
            'image2' => 2,
            'image3' => 4,
            'image4' => 5,
        ],
        
     ]);
    }
}
