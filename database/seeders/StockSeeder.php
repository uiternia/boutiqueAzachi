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
                 'quantity' => 3,
                 'type' => 1,
            ],
            [
                 'item_id' => 2,
                 'quantity' => 3,
                 'type' => 1,
            ],
            [
                'item_id' => 3,
                'quantity' => 3,
                'type' => 1
           ]
        ]);
                
    }
}
