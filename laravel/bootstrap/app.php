<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$laravelPath = dirname(__DIR__);
$projectPath = realpath("$laravelPath/../");
$providers = require __DIR__ . '/providers.php';

define('LARAVEL_PATH', $laravelPath);
define('PROJECT_PATH', $projectPath);

$app = Application::configure(basePath: $projectPath)
    ->withProviders($providers)
    ->withRouting(
        web: "$laravelPath/routes/web.php",
        commands: "$laravelPath/routes/console.php",
        health: '/up',
    )
    ->withCommands([
        realpath( "$projectPath/src/Presentation/Illuminate/Console/Commands"),
    ])
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

$app->useBootstrapPath("$laravelPath/bootstrap");
$app->useConfigPath("$laravelPath/config");
$app->useStoragePath("$laravelPath/storage");
$app->usePublicPath("$laravelPath/public");
$app->useEnvironmentPath($laravelPath);
$app->useDatabasePath("$laravelPath/database");
$app->useAppPath($laravelPath);

return $app;
