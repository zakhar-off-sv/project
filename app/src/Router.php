<?php

declare(strict_types=1);

namespace App;

final class Router
{
    private array $routes;

    public function __construct(
        private readonly Request $request,
    ) {
        $this->routes = [];
    }

    public function addRoute(string $method, string $path, callable $handler): void
    {
        $pattern = preg_replace('#\{(\w+)\}#', '(?P<\1>[^/]+)', $path);
        $pattern = sprintf('#^%s$#', $pattern);
        $this->routes[] = [
            'method' => strtoupper($method),
            'pattern' => $pattern,
            'handler' => $handler,
        ];
    }

    public function dispatch(): void
    {
        foreach ($this->routes as $route) {
            if ($route['method'] !== $this->request->getMethod()) {
                continue;
            }

            if (preg_match($route['pattern'], $this->request->getPath(), $matches)) {
                $params = array_filter(
                    $matches,
                    fn($key) => is_string($key),
                    ARRAY_FILTER_USE_KEY,
                );
                $route['handler'](...$params);

                return;
            }
        }

        throw new NotFoundException();
    }
}
