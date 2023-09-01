<?php

use LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\RateLimiterMiddleware;

test('has named constructors to create instances', function () {
    expect(RateLimiterMiddleware::perSecond(5))
        ->toBeInstanceOf(Closure::class)
        ->and(RateLimiterMiddleware::perMinute(60))
        ->toBeInstanceOf(Closure::class);
});
