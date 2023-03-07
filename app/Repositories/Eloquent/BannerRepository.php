<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\BannerRepositoryContract;
use App\Models\Banner;

class BannerRepository extends BaseRepository implements BannerRepositoryContract
{
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    public function getRandomBanners()
    {
        return $this->model->inRandomOrder()->limit(3)->get();
    }

}
