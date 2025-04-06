<?php

declare(strict_types=1);

namespace App\Classes;

final class Manager extends User
{
    public function __construct(
        string $firstName,
        string $lastName,
        \DateTimeImmutable $dob,
        private string $phone,
    ) {
        parent::__construct(
            firstName: $firstName,
            lastName: $lastName,
            dob: $dob,
            position: Position::manager,
        );
    }

    public function changePhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function __toString(): string
    {
        return sprintf('%s, %s', parent::__toString(), $this->phone);
    }
}
