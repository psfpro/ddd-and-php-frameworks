<?php

declare(strict_types=1);

namespace App\User\Application\EventListener;

use Application\EventListener\Notification\Service\NotificationServiceInterface;
use App\User\Domain\User\Event\UserRegistered;

final class SendWelcomeEmailOnUserRegistered
{
    private NotificationServiceInterface $notificationService;

    public function __construct(NotificationServiceInterface $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function __invoke(UserRegistered $userRegistered): void
    {
        $this->notificationService->sendNewUserWelcomeEmail($userRegistered->user);
    }
}
