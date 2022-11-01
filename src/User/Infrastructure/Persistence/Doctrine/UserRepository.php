<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Persistence\Doctrine;

use App\Common\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\User\Domain\User\UserId;
use App\User\Domain\User\Email;
use App\User\Domain\User\Repository\UserRepositoryInterface;
use App\User\Domain\User\User;

final class UserRepository extends DoctrineRepository implements UserRepositoryInterface
{
    protected function getEntityClassName(): string
    {
        return User::class;
    }

    public function findOneById(UserId $id): ?User
    {
        /** @var null|User $user */
        $user = $this->entityRepository->find($id->getValue());

        return $user;
    }

    public function findOneByEmail(Email $email): ?User
    {
        /** @var null|User $user */
        $user = $this->entityRepository->findOneBy(['email.address' => $email->getAddress()]);

        return $user;
    }

    public function findOneByConfirmationToken(string $token): ?User
    {
        /** @var null|User $user */
        $user = $this->entityRepository->findOneBy(['confirmation.token' => $token]);

        return $user;
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
