<?php

namespace App\Clients\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\Contracts\Services\ClientDomainServiceInterface;
use Domain\Services\ClientDomainService;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientDomainServiceInterface::class, ClientDomainService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
