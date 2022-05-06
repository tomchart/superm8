<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_types')->insert([
            [
                'type' => 'film',
            ],
            [
                'type' => 'documentary',
            ],
            [
                'type' => 'tv',
            ],
        ]);
    }
}
