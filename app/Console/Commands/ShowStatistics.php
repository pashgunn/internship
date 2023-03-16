<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\StatisticsServiceContract;
use Illuminate\Console\Command;

class ShowStatistics extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация статистики';

    /**
     * Execute the console command.
     */
    public function handle(StatisticsServiceContract $statisticsService)
    {
        $this->table(
            ['Общее количество машин', 'Общее количество новостей', 'Тег с наибольшим количеством новостей', 'Среднее количество новостей у тега'],
            $statisticsService->overallStatistics()
        );
        $this->table(
            ['id', 'title', 'length'],
            $statisticsService->longestAndShortestArticle()
        );
        $this->table(
            ['id', 'title', 'tags_count'],
            $statisticsService->mostTaggedArticle()
        );
    }
}
