<?php

declare(strict_types=1);

namespace App\User\Application\Command\User;

use App\Common\Application\DataTransferObject;

final class RegistrationUserCommand extends DataTransferObject
{
    public string $id;
    public string $email;
    public string $password;
    public string $name;
    public string $token;
}
