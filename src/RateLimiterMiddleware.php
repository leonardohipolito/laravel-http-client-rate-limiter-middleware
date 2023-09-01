<?php

namespace LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware;

use Psr\Http\Message\RequestInterface;

class RateLimiterMiddleware
{
    /** @var RateLimiter */
    protected $rateLimiter;

    private function __construct(RateLimiter $rateLimiter)
    {
        $this->rateLimiter = $rateLimiter;
    }

    public static function perSecond(int $limit, Store $store = null, Deferrer $deferrer = null): callable
    {
        $rateLimiter = new RateLimiter(
            $limit,
            RateLimiter::TIME_FRAME_SECOND,
            $store ?? new CacheStore(),
            $deferrer ?? new SleepDeferrer()
        );

        return (new self($rateLimiter))->__invoke();
    }

    public static function perMinute(int $limit, Store $store = null, Deferrer $deferrer = null): callable
    {
        $rateLimiter = new RateLimiter(
            $limit,
            RateLimiter::TIME_FRAME_MINUTE,
            $store ?? new CacheStore(),
            $deferrer ?? new SleepDeferrer()
        );

        return (new self($rateLimiter))->__invoke();
    }

    public function __invoke(): \Closure
    {
        return function (RequestInterface $request) {
            return $this->rateLimiter->handle(fn () => $request);
        };
    }
}
