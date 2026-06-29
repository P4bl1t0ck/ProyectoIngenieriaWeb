<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\HomeTask;
use App\Policies\HomeTaskPolicy;
use App\Services\RecommendationService;
use App\Services\RecommendationStrategyInterface;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //La forma en que vinculamos dentor de laravel que la interface de Recommendaciones, esta conecatda a su servicio.
        $this->app->bind(RecommendationStrategyInterface::class,RecommendationService::class);
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
