<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\HomeTask;
use App\Policies\HomeTaskPolicy;
use App\Services\RecommendationService;
use App\Services\RecommendationStrategyInterface;
use Illuminate\Support\Facades\Gate;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\EloquentProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Esto se llama inyeccion de dependencias
        //https://laravel-com.translate.goog/docs/13.x/container?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=tc
        //La forma en que vinculamos dentor de laravel que la interface de Recommendaciones, esta conecatda a su servicio.
        $this->app->bind(RecommendationStrategyInterface::class,RecommendationService::class);
        //La forma en que nosostros conectamos a nuestras clases de interfaz de producto con el EloquentProductRerpository
        $this->app->bind(ProductRepositoryInterface::class, EloquentProductRepository::class);

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
