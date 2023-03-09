<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\BannerRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;

class BannerRepository extends BaseRepository implements BannerRepositoryContract
{
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    public function getRandomBanners(int $count): Collection
    {
        return $this->model->inRandomOrder()->limit($count)->get();
    }
}
