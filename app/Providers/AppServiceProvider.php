<?php

namespace App\Providers;

use App\Services\Cse;
use App\Services\EbertApi;
use App\Services\MediaApi;
use App\Services\OMDb;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MediaApi::class, OMDb::class);
        $this->app->bind(EbertApi::class, Cse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
