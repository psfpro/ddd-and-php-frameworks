<?php

declare(strict_types=1);

namespace Domain\Service;

interface PasswordServiceInterface
{
    public function hash(string $password): string;

    public function verify(string $password, string $hash): bool;
}