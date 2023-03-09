<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface BannerRepositoryContract
{
    public function getRandomBanners(int $count): Collection;
}
