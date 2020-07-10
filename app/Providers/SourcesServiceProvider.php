<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\InstitucionService;
use App\Services\InstitucionServiceImpl;

use App\Repositories\Contracts\InstitucionRepository;
use App\Repositories\InstitucionRepositoryImpl;

class SourcesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(InstitucionService::class, InstitucionServiceImpl::class);
        //$this->app->bind(InstitucionRepository::class, InstitucionRepositoryMysqlImpl::class);
        $this->app->bind(InstitucionRepository::class, InstitucionRepositoryPostgresslImpl::class);
    }
}
