<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticleCreateUpdateServiceContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Services\ArticleCreateUpdateService;
use App\Services\TagsSynchronizer;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsSynchronizerContract::class, TagsSynchronizer::class);
        $this->app->singleton(ArticleCreateUpdateServiceContract::class, ArticleCreateUpdateService::class);
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
