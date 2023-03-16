<?php

namespace App\Services;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\CarRepositoryContract;
use App\Contracts\Repositories\StatisticsServiceContract;
use App\Contracts\Repositories\TagRepositoryContract;
use Illuminate\Support\Collection;

class StatisticsService implements StatisticsServiceContract
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly CarRepositoryContract $carRepository,
        private readonly TagRepositoryContract $tagRepository
    ) {
    }

    public function overallStatistics(): Collection
    {
        return collect([[$this->carRepository->getCount(), $this->articleRepository->getCount(),
            $this->tagRepository->tagWithMostArticles(), $this->tagRepository->averageArticles()]]);
    }

    public function longestAndShortestArticle(): Collection
    {
        return collect([$this->articleRepository->longestArticle(), $this->articleRepository->shortestArticle()]);
    }

    public function mostTaggedArticle(): Collection
    {
        return collect([$this->articleRepository->taggedArticle()]);
    }
}
