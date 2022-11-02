<?php

declare(strict_types=1);

namespace App\User;

use App\User\Domain\User\Repository\UserRepositoryInterface;
use App\User\Infrastructure\Persistence\Doctrine\UserRepository;
use Illuminate\Support\ServiceProvider;

final class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}
