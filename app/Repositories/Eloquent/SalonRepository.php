<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\SalonRepositoryContract;
use App\Contracts\Repositories\SalonsClientServiceContract;
use App\Models\Salon;
use Illuminate\Support\Facades\Cache;

class SalonRepository extends BaseRepository implements SalonRepositoryContract
{

    public function __construct(private readonly SalonsClientServiceContract $salonsClientService, Salon $model)
    {
        parent::__construct($model);
    }

    public function allSalons(): array
    {
        $cacheKey = 'allSalons';
        $cacheDuration = now()->addHour();
        return Cache::remember($cacheKey, $cacheDuration, fn() => $this->salonsClientService->salons());
    }

    public function randomSalons(array $params): array
    {
        $cacheKey = 'randomSalons: ' . $params['limit'];
        $cacheDuration = now()->addMinutes(5);
        return Cache::remember($cacheKey, $cacheDuration, fn() => $this->salonsClientService->salons($params));
    }
}
