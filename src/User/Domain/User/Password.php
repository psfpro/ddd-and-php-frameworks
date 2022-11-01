<?php

declare(strict_types=1);

namespace App\User\Domain\User;

final class Password
{
    private string $hash;

    public function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}
