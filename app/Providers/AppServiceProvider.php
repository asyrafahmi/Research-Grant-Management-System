<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Academician;
use App\Policies\AcademicianPolicy;
use App\Models\ResearchGrant;
use App\Policies\ResearchGrantPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Academician::class => AcademicianPolicy::class,
        ResearchGrant::class => ResearchGrantPolicy::class,
    ];

    public function boot(): void
    {
        Gate::define('manage-all', function (User $user) {
            return $user->userCategory === 'admin';
        });
    }
}
