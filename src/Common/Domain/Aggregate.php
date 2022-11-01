<?php

declare(strict_types=1);

namespace App\Common\Domain;

abstract class Aggregate
{
    public array $events = [];

    public function recordThat(object $event): void
    {
        $this->events[] = $event;
    }
}
