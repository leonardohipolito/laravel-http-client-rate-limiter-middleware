<?php

namespace LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\LaravelHttpClientRateLimiterMiddlewareServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'LeonardoHipolito\\LaravelHttpClientRateLimiterMiddleware\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelHttpClientRateLimiterMiddlewareServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-http-client-rate-limiter-middleware_table.php.stub';
        $migration->up();
        */
    }
}
