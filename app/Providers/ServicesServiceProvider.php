<?php

namespace App\Providers;

use App\Contracts\Repositories\CreateArticleServiceContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Contracts\Repositories\UpdateArticleServiceContract;
use App\Services\CreateArticleService;
use App\Services\TagsSynchronizer;
use App\Services\UpdateArticleService;
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
        $this->app->singleton(CreateArticleServiceContract::class, CreateArticleService::class);
        $this->app->singleton(UpdateArticleServiceContract::class, UpdateArticleService::class);
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
