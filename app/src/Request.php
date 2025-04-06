<?php

declare(strict_types=1);

namespace App;

final readonly class Request
{
    public const string METHOD_GET = 'GET';
    public const string METHOD_POST = 'POST';
    public const string METHOD_PUT = 'PUT';
    public const string METHOD_PATCH = 'PATCH';
    public const string METHOD_DELETE = 'DELETE';

    private array $get;
    private array $post;
    private array $server;
    private array $headers;
    private string $method;
    private string $uri;
    private string $body;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->headers = getallheaders();
        $this->method = $_SERVER['REQUEST_METHOD'] ?? self::METHOD_GET;
        $this->uri = $_SERVER['REQUEST_URI'] ?? '/';
        $this->body = file_get_contents('php://input');
    }

    public function getQuery(string $key, string|array|null $default = null): string|array|null
    {
        return $this->get[$key] ?? $default;
    }

    public function getPost(string $key, string|array|null $default = null): string|array|null
    {
        return $this->post[$key] ?? $default;
    }

    public function getServer(string $key, int|float|string|array|null $default = null): int|float|string|array|null
    {
        return $this->server[$key] ?? $default;
    }

    public function getHeader(string $key, ?string $default = null): ?string
    {
        return $this->headers[$key] ?? $default;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getPath(): string
    {
        return parse_url($this->uri, PHP_URL_PATH);
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function isGet(): bool
    {
        return $this->method === self::METHOD_GET;
    }

    public function isPost(): bool
    {
        return $this->method === self::METHOD_POST;
    }
}
