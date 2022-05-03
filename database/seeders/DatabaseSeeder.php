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

        // create 3 media types
        \App\Models\MediaType::factory(3)->create()->each(function ($media_type) {
            // seed the relation with 15 media rows
            $media = \App\Models\Media::factory(15)->make();
            $media->each(function ($media) use ($media_type) {
                $media->type()->associate($media_type);
                $media->save();
            });
        });

        // seed users have seen random media
        \App\Models\User::all()->each(function ($user) {
            $media = \App\Models\Media::all()->random(5);
            $user->watched()->saveMany($media);
        });



        $watchlists = \App\Models\Watchlist::all();
        $watchlists->each(function ($watchlist) {
            $media = \App\Models\Media::inRandomOrder()->limit(7)->get();
            $watchlist->media()->saveMany($media);
        });
    }
}
