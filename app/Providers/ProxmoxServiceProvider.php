<?php

namespace Stratum\Providers;

use Illuminate\Support\ServiceProvider;
use proxmox\pve;

class ProxmoxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        
        $this->app->singleton(pve::class, function ($app) {
            return new pve(config('proxmox.config'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
