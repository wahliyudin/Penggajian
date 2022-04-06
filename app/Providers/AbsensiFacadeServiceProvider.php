<?php

namespace App\Providers;

use Domain\Repositories\AbsensiRepository;
use Illuminate\Support\ServiceProvider;

class AbsensiFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('absensi', function(){
            return new AbsensiRepository();
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
