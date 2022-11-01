<?php

declare(strict_types=1);

namespace App\User\Domain\User\Event;

use App\User\Domain\User\User;

final class UserRegistered
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
