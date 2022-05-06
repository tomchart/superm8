<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rating_ebert')->insert([
            [
                'rating' => 0,
            ],
            [
                'rating' => 0.5,
            ],
            [
                'rating' => 1.0,
            ],
            [
                'rating' => 1.5,
            ],
            [
                'rating' => 2.0,
            ],
            [
                'rating' => 2.5,
            ],
            [
                'rating' => 3.0,
            ],
            [
                'rating' => 3.5,
            ],
            [
                'rating' => 4.0,
            ],
        ]);
    }
}
