<?php

namespace LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware;

use Illuminate\Support\Facades\Cache;

class CacheStore implements Store
{
    public function __construct(protected string $name = 'laravel-http-client-rate-limiter')
    {

    }

    public function get(): array
    {
        return Cache::get($this->name, []);
    }

    public function push(int $timestamp, int $limit)
    {
        Cache::put($this->name, array_merge($this->get(), [$timestamp]));
    }
}
