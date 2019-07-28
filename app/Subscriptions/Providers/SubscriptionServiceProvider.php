<?php

namespace App\Subscriptions\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\Contracts\Services\SubscriptionDomainServiceInterface;
use Domain\Services\SubscriptionDomainService;

class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SubscriptionDomainServiceInterface::class, SubscriptionDomainService::class);
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
