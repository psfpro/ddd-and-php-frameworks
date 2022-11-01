<?php

declare(strict_types=1);

namespace App\Common\Domain;

interface EventBus
{
    public function publish(Event $event): void;

    public function publishAll(array $events): void;
}