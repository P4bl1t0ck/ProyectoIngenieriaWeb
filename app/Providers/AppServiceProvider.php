<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\HomeTask;
use App\Policies\HomeTaskPolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registrar la policy para HomeTask
        Gate::policy(HomeTask::class, HomeTaskPolicy::class);
    }
}
