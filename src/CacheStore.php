<?php

namespace LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware;

use Illuminate\Support\Facades\Cache;

class CacheStore implements Store
{
    public function __construct(protected string $name = 'laravel-http-client-rate-limiter', protected ?string $driver = null)
    {

    }

    public function get(): array
    {
        return Cache::store($this->driver)->get($this->name, []);
    }

    public function push(int $timestamp, int $limit): void
    {
        Cache::store($this->driver)->put($this->name, array_merge($this->get(), [$timestamp]));
    }
}
