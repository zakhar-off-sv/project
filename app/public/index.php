<?php

declare(strict_types=1);

use App\Kernel;

const APP_ROOT_NAMESPACE = 'App\\';
define('APP_ROOT_PATH', dirname(__FILE__, 2));

spl_autoload_register(function (string $class): void {
    if (str_starts_with($class, APP_ROOT_NAMESPACE)) {
        require_once APP_ROOT_PATH . '/src/' . str_replace([APP_ROOT_NAMESPACE, '\\'], '/', $class) . '.php';
    }
});

new Kernel()->run();
