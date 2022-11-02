<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\Bus\Messenger;

use App\Common\Domain\Event;
use App\Common\Domain\EventBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DispatchAfterCurrentBusStamp;

final class MessengerEventBus implements EventBus
{
    protected MessageBusInterface $eventBus;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function publish(Event $event): void
    {
        try {
            $this->eventBus->dispatch($event, [new DispatchAfterCurrentBusStamp()]);
        } catch (HandlerFailedException $e) {
            throw $e->getPrevious() ?? $e;
        }
    }

    public function publishAll(array $events): void
    {
        foreach ($events as $event) {
            $this->publish($event);
        }
    }
}