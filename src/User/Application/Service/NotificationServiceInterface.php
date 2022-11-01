<?php

declare(strict_types=1);

namespace Application\EventListener\Notification\Service;

use App\User\Domain\User\User;

interface NotificationServiceInterface
{
    public function sendNewUserWelcomeEmail(User $user): void;
}
