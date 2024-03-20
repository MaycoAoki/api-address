<?php

namespace App\Providers;

use App\Services\ViaCep\ViaCepClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ViaCepClient::class, function (){
            return new ViaCepClient(config('services.viacep.base_uri'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
