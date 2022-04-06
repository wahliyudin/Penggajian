<?php

namespace App\Providers;

use Domain\Repositories\PegawaiRepository;
use Illuminate\Support\ServiceProvider;

class PegawaiFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('pegawai', function (){
            return new PegawaiRepository();
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
