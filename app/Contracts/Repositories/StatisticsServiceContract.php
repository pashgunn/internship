<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface StatisticsServiceContract
{
    public function overallStatistics(): Collection;
    public function longestAndShortestArticle(): Collection;
    public function mostTaggedArticle(): Collection;
}
