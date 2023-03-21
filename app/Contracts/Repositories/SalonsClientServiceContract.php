<?php

namespace App\Contracts\Repositories;


interface SalonsClientServiceContract
{
    public function salons(array $params = null): array;
}
