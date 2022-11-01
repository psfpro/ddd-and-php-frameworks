<?php

declare(strict_types=1);

namespace App\User\Domain\User\Specification;

use App\User\Domain\User\Email;
use App\User\Domain\User\Repository\UserRepositoryInterface;

final class EmailIsUnique
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function isSatisfiedBy(Email $email): bool
    {
        return !$this->userRepository->findOneByEmail($email);
    }
}
