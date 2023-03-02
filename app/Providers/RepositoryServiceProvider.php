<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\CarRepositoryContract;
use App\Contracts\Repositories\EloquentRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Repositories\Eloquent\ArticleRepository;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\CarRepository;
use App\Repositories\Eloquent\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EloquentRepositoryContract::class, BaseRepository::class);
        $this->app->singleton(ArticleRepositoryContract::class, ArticleRepository::class);
        $this->app->singleton(CarRepositoryContract::class, CarRepository::class);
        $this->app->singleton(TagRepositoryContract::class, TagsRepository::class);
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
