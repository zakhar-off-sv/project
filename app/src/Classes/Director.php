<?php

declare(strict_types=1);

namespace App\Classes;

#require_once __DIR__ . '/User.php';

final class Director extends User
{
    public function __construct(
        string $firstName,
        string $lastName,
        \DateTimeImmutable $dob,
    ) {
        parent::__construct(
            firstName: $firstName,
            lastName: $lastName,
            dob: $dob,
            position: Position::director,
        );
    }
}
