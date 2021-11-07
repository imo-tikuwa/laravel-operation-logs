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

        $config_path = dirname(__DIR__, 2) . DS . 'config' . DS . 'operation_log.php';
        $this->publishes([
            $config_path => config_path('operation_log.php'),
        ], 'operation-log-config');

        $this->loadMigrationsFrom(dirname(__DIR__, 2) . DS . 'database' . DS . 'migrations');
    }
}
