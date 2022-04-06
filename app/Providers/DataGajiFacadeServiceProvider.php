<?php

namespace App\Providers;

use Domain\Repositories\DataGajiRepository;
use Illuminate\Support\ServiceProvider;

class DataGajiFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('data-gaji', function(){
            return new DataGajiRepository();
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
