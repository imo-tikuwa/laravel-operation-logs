# laravel-operation-logs

## Description
It provides middleware that records client IP, user agent, request URL, request date and time, etc. for each request.

## Install
```
composer config repositories.imo-tikuwa/laravel-operation-logs vcs https://github.com/imo-tikuwa/laravel-operation-logs
composer require imo-tikuwa/laravel-operation-logs:dev-master
php artisan migrate
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
