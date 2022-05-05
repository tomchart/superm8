<?php

namespace App\Providers;

use App\Models\Club;
use App\Models\Invite;
use App\Models\Media;
use App\Policies\ClubPolicy;
use App\Policies\InvitePolicy;
use App\Policies\MediaUserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Club::class => ClubPolicy::class,
        Invite::class => InvitePolicy::class,
        Media::class => MediaUserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
