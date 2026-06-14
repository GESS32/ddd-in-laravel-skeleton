<?php

use Infrastructure\Illuminate\DependencyInjection\CommandBusServiceProvider;
use Infrastructure\Illuminate\DependencyInjection\QueryBusServiceProvider;
use Infrastructure\Illuminate\DependencyInjection\ResourceServiceProvider;
use Presentation\Illuminate\Console\GeneratorServiceProvider;

return [
    ResourceServiceProvider::class,
    GeneratorServiceProvider::class,
    CommandBusServiceProvider::class,
    QueryBusServiceProvider::class,
];
