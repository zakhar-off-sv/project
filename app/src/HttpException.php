<?php

declare(strict_types=1);

namespace App;

class HttpException extends \Exception
{
    private int $statusCode;

    public function __construct(string $message = 'Internal Server Error', int $statusCode = 500)
    {
        parent::__construct($message, $statusCode);

        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
