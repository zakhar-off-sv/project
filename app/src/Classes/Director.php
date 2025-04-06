<?php

declare(strict_types=1);

namespace App\Classes;

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
