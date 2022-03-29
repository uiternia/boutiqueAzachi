<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
             'owner_id' => 1,
             'filename' => 'ec-image1.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image2.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image3.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image4.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image5.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image6.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image7.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image8.jpg',
            ],
            [
                'owner_id' => 1,
                'filename' => 'ec-image9.jpg',
            ],
        ]);
    }
}
