<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryContract
{
    public function homepageArticles(int $paginatesCount): Collection;
}
