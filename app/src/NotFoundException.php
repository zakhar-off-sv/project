<?php

declare(strict_types=1);

namespace App;

class NotFoundException extends HttpException
{
    public function __construct(string $message = 'Not Found')
    {
        parent::__construct($message, 404);
    }
}
