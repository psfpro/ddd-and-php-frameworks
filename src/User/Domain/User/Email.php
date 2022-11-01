<?php

declare(strict_types=1);

namespace App\User\Domain\User;

use Assert\Assert;

final class Email
{
    private string $address;

    public function __construct(string $address)
    {
        Assert::that($address)->email();
        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
