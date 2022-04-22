<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(20)->create();
        \App\Models\Club::factory(5)->create();

        $clubs = \App\Models\Club::all();

        \App\Models\User::all()->each(function ($user) use ($clubs) {
            $user->clubs()->attach(
                $clubs->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
