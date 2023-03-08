<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\BannerRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BannerRepository extends BaseRepository implements BannerRepositoryContract
{
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    public function getRandomBanners(int $count): Collection
    {
        $cacheKey = 'RandomBanners:' . $count;
        $cacheDuration = now()->addHour();
        return Cache::tags(['homepage', 'banners'])
            ->remember($cacheKey, $cacheDuration, fn () => $this->model->with('image')->inRandomOrder()->limit($count)->get());
    }
}
