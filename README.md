# laravel-operation-logs

## Description
It provides middleware that records client IP, user agent, request URL, request date and time, etc. for each request.

## Install
```
# composer config repositories.imo-tikuwa/laravel-operation-logs vcs https://github.com/imo-tikuwa/laravel-operation-logs
# composer require imo-tikuwa/laravel-operation-logs:dev-master
# php artisan migrate
```

## Usage
Add OperationLog middleware to $middleware or $middlewareGroups in app/Http/Kernel.php
```
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
+        \ImoTikuwa\OperationLogs\Http\Middleware\OperationLogs::class,
    ];

or

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
+            \ImoTikuwa\OperationLogs\Http\Middleware\OperationLogs::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
```

## Exclude Setting.
If you do not want to record access from some IPs, URLs, and user agents, you can set exclusions.

1. Execute the vendor:publish command and copy operation_log.php to the config directory. (Tag: operation-log-config)
```
# php artisan vendor:publish
Which provider or tag's files would you like to publish?:
  [0 ] Publish files from all providers and tags listed below
~~~~~~
  [20] Tag: operation-log-config
  [21] Tag: sail
 > 20
```

2. Edit config/operation_log.php.
```
    'exclude_ips' => [
        '172.30',
        '172.31.0',
    ],

    'exclude_user_agents' => [
        'Chrome',
        'Edg/',
    ],

    'exclude_urls' => [
        '/admin',
    ],
```
