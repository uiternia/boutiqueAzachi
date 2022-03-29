<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            [
                 'item_id' => 1,
                 'quantity1' => 3,
                 'quantity2' => 3,
                 'quantity3' => 3,
                 'quantity4' => 3,
                 'type' => 1,
            ],
            [
                 'item_id' => 2,
                 'quantity1' => -1,
                 'quantity2' => -1,
                 'quantity3' => 2,
                 'quantity4' => 2,
                 'type' => 1,
            ],
            [
                'item_id' => 3,
                'quantity1' => 3,
                'quantity2' => 3,
                'quantity3' => 3,
                'quantity4' => 0,
                'type' => 1,
           ]
        ]);
                
    }
}
