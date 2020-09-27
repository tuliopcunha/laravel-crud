<?php

namespace App\Providers;

use App\Models\Clients;
use App\Models\Products;
use App\Repositories\Contracts\ClientRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\EloquentClientRepository;
use App\Repositories\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientRepository::class, function () {
            return new EloquentClientRepository(new Clients());
        });

        $this->app->bind(ProductRepository::class, function () {
            return new EloquentProductRepository(new Products());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            ClientRepository::class,
            ProductRepository::class
        ];
    }
}
