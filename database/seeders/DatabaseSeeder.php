<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // create 5 clubs
        \App\Models\Club::factory(5)->create()->each(function ($club) {
            // Seed the relation with 10 users
            $users = \App\Models\User::factory(10)->make();
            $club->users()->saveMany($users);

            // Seed the relation with 3 watchlists
            $watchlists = \App\Models\Watchlist::factory(3)->make();
            $club->watchlists()->saveMany($watchlists);
        });

        // create 2 media types
        $this->call([
            MediaTypeSeeder::class,
        ]);

        $this->call([
            RatingSeeder::class,
        ]);
    }
}
