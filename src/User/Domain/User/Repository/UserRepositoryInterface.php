<?php

declare(strict_types=1);

namespace App\User\Domain\User\Repository;

use App\User\Domain\User\Email;
use App\User\Domain\User\User;
use App\User\Domain\User\UserId;

interface UserRepositoryInterface
{
    public function findOneById(UserId $id): ?User;

    public function findOneByEmail(Email $email): ?User;

    public function findOneByConfirmationToken(string $token): ?User;

    public function save(User $user): void;
}
