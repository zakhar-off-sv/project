<?php

declare(strict_types=1);

namespace App;

use App\Classes\Director;
use App\Classes\Manager;

final class Kernel
{
    public function run(): void
    {
        $request = new Request();
        $router = new Router($request);

        $router->addRoute(Request::METHOD_GET, '/', function (): void {
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
        });

        $router->addRoute(Request::METHOD_GET, '/test/{id}', function (string $id) use ($request): void {
            echo '<pre>';
            echo sprintf('Uri: %s', $request->getUri()) . PHP_EOL;
            echo sprintf('Path: %s', $request->getPath()) . PHP_EOL;
            echo sprintf('{id}: %s', $id) . PHP_EOL;
            echo '</pre>';
        });

        $router->dispatch();
    }
}
