<?php

declare(strict_types=1);

namespace App\User\Application\Command\User;

use App\Common\Application\DataTransferObject;

final class ConfirmationUserCommand extends DataTransferObject
{
    public string $token;
}
