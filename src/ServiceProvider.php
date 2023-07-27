<?php

namespace Kolirt\Sitemap;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'sitemap');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}