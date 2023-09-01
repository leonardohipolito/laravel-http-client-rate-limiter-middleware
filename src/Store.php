<?php

namespace LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware;

interface Store
{
    public function get(): array;

    public function push(int $timestamp, int $limit);
}
