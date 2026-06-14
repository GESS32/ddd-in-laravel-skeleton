<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;

$app = require __DIR__.'/laravel/bootstrap/app.php';

if ($app instanceof Application) {
    $app->make(Kernel::class)->bootstrap();

    if (! defined('LARAVEL_VERSION')) {
        define('LARAVEL_VERSION', $app->version());
    }
}
