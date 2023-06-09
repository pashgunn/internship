<?php

namespace App\Providers;

use App\View\Layouts\Footer;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
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

        Blade::component('layouts.footer', Footer::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->user()?->role?->name === 'admin';
        });
    }
}
