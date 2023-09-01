# A rate limiter to Laravel Http Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/leonardohipolito/laravel-http-client-rate-limiter-middleware.svg?style=flat-square)](https://packagist.org/packages/leonardohipolito/laravel-http-client-rate-limiter-middleware)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/leonardohipolito/laravel-http-client-rate-limiter-middleware/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/leonardohipolito/laravel-http-client-rate-limiter-middleware/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/leonardohipolito/laravel-http-client-rate-limiter-middleware/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/leonardohipolito/laravel-http-client-rate-limiter-middleware/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/leonardohipolito/laravel-http-client-rate-limiter-middleware.svg?style=flat-square)](https://packagist.org/packages/leonardohipolito/laravel-http-client-rate-limiter-middleware)

A rate limiter middleware for Laravel Http Client. Here's what you need to know:

- Specify a maximum amount of requests per minute or per second
- When the limit is reached, the process will `sleep` until the request can be made
- Implement your own driver to persist the rate limiter's request store. This is necessary if the rate limiter needs to
  work across separate processes, the package ships with an `InMemoryStore`.

## Installation

You can install the package via composer:

```bash
composer require leonardohipolito/laravel-http-client-rate-limiter-middleware
```

## Usage

```php
use \LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\RateLimiterMiddleware;
use \LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\CacheStore;
Http::macro(
    'jsonPlaceholder',
    fn () => Http::baseUrl('https://jsonplaceholder.typicode.com')
        ->withRequestMiddleware(RateLimiterMiddleware::perMinute(60, new CacheStore('jsonplaceholder-rate-limit')
        ->acceptJson()
        ->asJson()
);
```

You can create a rate limiter to limit per second or per minute.
```php

use \LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\RateLimiterMiddleware;

RateLimiterMiddleware::perSecond(5);
RateLimiterMiddleware::perMinute(60);

```

## Custom stores
By default, the rate limiter works in Cache. This means that if you have a second PHP process but you can create your own store.

```php
use \LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\RateLimiterMiddleware;
use MyApp\RateLimiterStore;
use \LeonardoHipolito\LaravelHttpClientRateLimiterMiddleware\RateLimit;

RateLimiterMiddleware::perSecond(3, new RateLimiterStore());

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Leonardo Hipolito](https://github.com/leonardohipolito)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
