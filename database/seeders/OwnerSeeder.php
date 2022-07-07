<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
             'name' => 'test1',
             'email' => 'test1@test.com',
             'password' => Hash::make('passworddesu'),
             'created_at' => '2022/02/12 12:12:12'
            ],
        ]);
    }
}
