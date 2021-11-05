<?php

namespace App\Providers;

use App\Contracts\ShopRepository;
use App\Repositories\ShopRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(ShopRepository::class, ShopRepositoryEloquent::class);
        //:end-bindings:
    }
}
