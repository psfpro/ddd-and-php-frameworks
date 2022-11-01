<?php

declare(strict_types=1);

namespace App\User\Application\Command\User;

use App\User\Domain\User\Repository\UserRepositoryInterface;
use App\User\Domain\User\User;

final class ConfirmationUserCommandHandler
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(ConfirmationUserCommand $command): void
    {
        $user = $this->userRepository->findOneByConfirmationToken($command->token);
        assert($user instanceof User);

        $user->getConfirmation()->passed();
        $this->userRepository->save($user);
    }
}
