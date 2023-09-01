<?php

namespace LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware;

interface Deferrer
{
    public function getCurrentTime(): int;

    public function sleep(int $milliseconds);
}
