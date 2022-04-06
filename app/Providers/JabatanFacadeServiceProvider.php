<?php

namespace App\Providers;

use Domain\Repositories\JabatanRepository;
use Illuminate\Support\ServiceProvider;

class JabatanFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('jabatan', function(){
            return new JabatanRepository();
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
