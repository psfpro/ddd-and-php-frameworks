<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Password\Php;

use Domain\Service\PasswordServiceInterface;

class PasswordService implements PasswordServiceInterface
{
    public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}