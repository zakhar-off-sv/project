<?php

declare(strict_types=1);

#require_once __DIR__ . '/../src/Classes/Director.php';
#require_once __DIR__ . '/../src/Classes/Manager.php';

use App\Classes\Director;
use App\Classes\Manager;

const APP_ROOT_NAMESPACE = 'App\\';
define('APP_ROOT_PATH', dirname(__FILE__, 2));

spl_autoload_register(function (string $class): void {
    if (str_starts_with($class, APP_ROOT_NAMESPACE)) {
        require_once APP_ROOT_PATH . '/src/' . str_replace([APP_ROOT_NAMESPACE, '\\'], '/', $class) . '.php';
    }
});

echo '<pre>';
echo sprintf('PHP version: %s', phpversion()) . PHP_EOL;
echo sprintf('Root namespace: %s', APP_ROOT_NAMESPACE) . PHP_EOL;
echo sprintf('Root path: %s', APP_ROOT_PATH) . PHP_EOL;

$director = new Director(
    firstName: 'John',
    lastName: 'Doe',
    dob: new \DateTimeImmutable('1990-01-01'),
);
echo $director . PHP_EOL;

$manager = new Manager(
    firstName: 'John',
    lastName: 'Smith',
    dob: new \DateTimeImmutable('2002-02-02'),
    phone: '+375297181818',
);
echo $manager . PHP_EOL;
$manager->changePhone('+375297181111');
echo $manager . PHP_EOL;

echo '</pre>';
