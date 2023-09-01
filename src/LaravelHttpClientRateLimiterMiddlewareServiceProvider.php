<?php

namespace LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelHttpClientRateLimiterMiddlewareServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-http-client-rate-limiter-middleware');
    }
}
