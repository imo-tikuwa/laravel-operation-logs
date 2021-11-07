<?php

namespace ImoTikuwa\OperationLogs\Providers;

use Illuminate\Support\ServiceProvider;

class OperationLogsServiceProvider extends ServiceProvider
{
    /**
     * Initial startup process for all application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!defined('DS')) {
            define('DS', DIRECTORY_SEPARATOR);
        }

        $this->loadMigrationsFrom(dirname(__DIR__, 2) . DS . 'database' . DS . 'migrations');
    }
}
