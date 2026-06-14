<?php

use Infrastructure\Illuminate\DependencyInjection\CommandBusServiceProvider;
use Infrastructure\Illuminate\DependencyInjection\GeneratorServiceProvider;
use Infrastructure\Illuminate\DependencyInjection\QueryBusServiceProvider;
use Infrastructure\Illuminate\DependencyInjection\ResourceServiceProvider;

return [
    ResourceServiceProvider::class,
    GeneratorServiceProvider::class,
    CommandBusServiceProvider::class,
    QueryBusServiceProvider::class,
];
