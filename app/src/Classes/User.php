<?php

declare(strict_types=1);

namespace App\Classes;

#require_once __DIR__ . '/Position.php';

abstract class User implements \Stringable
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly \DateTimeImmutable $dob,
        public readonly Position $position,
    ) {
    }

    public function __toString(): string
    {
        return sprintf(
            '%s %s, %s, %s',
            $this->firstName,
            $this->lastName,
            $this->dob->format('d.m.Y'),
            $this->position->name,
        );
    }
}
