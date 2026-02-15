<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: realpath(__DIR__ . '/../routes/web.php'),
        commands: realpath(__DIR__ . '/../routes/console.php'),
        health: '/up',
    )
    ->withCommands([
        realpath( __DIR__ . '/../../Presentation/Illuminate/Console/Commands'),
    ])
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

$app->useConfigPath(realpath(__DIR__ . '/../config'));
$app->useStoragePath(realpath(__DIR__ . '/../storage'));
$app->usePublicPath(realpath(__DIR__ . '/../public'));
$app->useEnvironmentPath(realpath(__DIR__ . '/../.env'));
$app->useDatabasePath(realpath(__DIR__ . '/../database'));
$app->useAppPath(realpath(__DIR__ . '/../'));

return $app;
