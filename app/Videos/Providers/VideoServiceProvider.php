<?php

namespace App\Videos\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\Contracts\Services\VideoDomainServiceInterface;
use Domain\Services\VideoDomainService;

class VideoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VideoDomainServiceInterface::class, VideoDomainService::class);
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
