<?php

namespace App\Services;

use App\Contracts\Repositories\SalonsClientServiceContract;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(
        private readonly string $login,
        private readonly string $password,
        private readonly string $baseUrl
    ) {
    }

    public function salons(array $params = null): array
    {
        try {
            if ($params) {
                $response = Http::withBasicAuth($this->login, $this->password)->get($this->baseUrl, $params)->throw()->json();
            } else {
                $response = Http::withBasicAuth($this->login, $this->password)->get($this->baseUrl)->throw()->json();
            }
        } catch (RequestException $e) {
            return [];
        }
        return $response;
    }
}
