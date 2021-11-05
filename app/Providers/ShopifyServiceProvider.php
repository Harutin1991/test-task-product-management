<?php

namespace App\Providers;

use App\Services\API;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

/**
 * Class ShopifyServiceProvider
 * @package App\Providers
 */
class ShopifyServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = TRUE;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ShopifyAPI', function ($app, $config = FALSE) {
            return new API($config);
        });
    }

    public function boot()
    {
        AliasLoader::getInstance()->alias('ShopifyAPI', 'App\Services\API');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ShopifyAPI', 'App\Services\API'];
    }

}
