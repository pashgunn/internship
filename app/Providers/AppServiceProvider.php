<?php

namespace App\Providers;

use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Services\TagsSynchronizer;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('toAssoc', function () {
            return $this->reduce(function ($assoc, $keyValuePair) {
                [$key, $value] = $keyValuePair;
                $assoc[$key] = $value;
                return collect($assoc);
            });
        });

        Relation::morphMap([
            'article' => \App\Models\Article::class,
        ]);

        Paginator::defaultView('pagination::default');
        $this->app->singleton(TagsSynchronizerContract::class, TagsSynchronizer::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
