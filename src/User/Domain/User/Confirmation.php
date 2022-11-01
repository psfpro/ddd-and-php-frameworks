<?php

declare(strict_types=1);

namespace App\User\Domain\User;

final class Confirmation
{
    private string $token;
    private bool $isPassed;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->isPassed = false;
    }

    public function passed(): void
    {
        $this->isPassed = true;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function isPassed(): bool
    {
        return $this->isPassed;
    }
}
