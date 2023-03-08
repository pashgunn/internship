<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CarRepositoryContract;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class CarRepository extends BaseRepository implements CarRepositoryContract
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }

    public function homepageCars(int $paginatesCount): Collection
    {
        $cacheKey = 'homepageCars:' . $paginatesCount;
        $cacheDuration = now()->addHour();
        return Cache::tags(['homepage', 'cars'])
            ->remember($cacheKey, $cacheDuration, fn () =>$this->model->with('mainImage')->where('is_new', true)->limit($paginatesCount)->get());
    }

    public function forClients(): Collection
    {
        return $this->model->with('carBody', 'carEngine', 'carClass')->get();
    }

    public function getCarCatalog(int $page, int $paginatesCount): LengthAwarePaginator
    {
        $cacheKey = 'catalogPage:' . $page;
        $cacheDuration = now()->addHour();
        return Cache::tags(['catalog', 'cars'])
            ->remember($cacheKey, $cacheDuration, fn () => $this->model->with('mainImage')->paginate($paginatesCount));
    }

    public function catalogWithCategory(int $page, \Illuminate\Support\Collection $categoriesId, int $paginatesCount): LengthAwarePaginator
    {
        $cacheKey = 'categoriesIds:' . $categoriesId . ' catalogPage:' . $page;
        $cacheDuration = now()->addHour();
        return Cache::tags(['catalog', 'cars'])
            ->remember($cacheKey, $cacheDuration, fn () => $this->model->with('mainImage')->whereIn('category_id', $categoriesId)->paginate($paginatesCount));
    }
}
