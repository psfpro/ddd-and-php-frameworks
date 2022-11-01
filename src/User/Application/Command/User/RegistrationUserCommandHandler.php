<?php

declare(strict_types=1);

namespace App\User\Application\Command\User;

use App\User\Domain\User\Confirmation;
use App\User\Domain\User\Email;
use App\User\Domain\User\Password;
use App\User\Domain\User\Repository\UserRepositoryInterface;
use App\User\Domain\User\Specification\EmailIsUnique;
use App\User\Domain\User\User;
use App\User\Domain\User\UserId;

final class RegistrationUserCommandHandler
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(RegistrationUserCommand $command): void
    {
        assert((new EmailIsUnique($this->userRepository))->isSatisfiedBy(new Email($command->email)));
        $user = User::registration(
            new UserId($command->id),
            new Email($command->email),
            new Password($command->password),
            $command->name,
            new Confirmation($command->token)
        );
        $this->userRepository->save($user);
    }
}
