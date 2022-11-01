<?php

declare(strict_types=1);

namespace App\User\Domain\User;

use Assert\Assert;

final class UserId
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::that($value)->uuid();
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}