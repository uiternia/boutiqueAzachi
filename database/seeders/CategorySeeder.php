<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand_categories')->insert([
            [
             'name' => 'ブランド1',
             'sort_order' => 1,
            ],
            [
                'name' => 'ブランド2',
                'sort_order' => 2,
            ],
            [
                'name' => 'ブランド3',
                'sort_order' => 3,
            ],
            [
                'name' => 'ブランド4',
                'sort_order' => 4,
            ],
            [
                'name' => 'ブランド5',
                'sort_order' => 5,
            ],
        ]);

        DB::table('item_categories')->insert([
            [
             'name' => 'アウター',
             'sort_order' => 1,
             'brand_category_id' =>1
            ],
            [
                'name' => 'コート',
                'sort_order' => 2,
                'brand_category_id' =>1
            ],
            [
                'name' => 'アウター',
                'sort_order' => 1,
                'brand_category_id' =>2
               ],
               [
                   'name' => 'コート',
                   'sort_order' => 2,
                   'brand_category_id' =>2
               ],
               [
                'name' => 'アウター',
                'sort_order' => 1,
                'brand_category_id' =>3
               ],
               [
                   'name' => 'コート',
                   'sort_order' => 2,
                   'brand_category_id' =>3
               ],
               [
                'name' => 'アウター',
                'sort_order' => 1,
                'brand_category_id' =>4
               ],
               [
                   'name' => 'コート',
                   'sort_order' => 2,
                   'brand_category_id' =>4
               ],
               [
                'name' => 'アウター',
                'sort_order' => 1,
                'brand_category_id' =>5
               ],
               [
                   'name' => 'コート',
                   'sort_order' => 2,
                   'brand_category_id' =>5
               ],
        ]);
    }
}
