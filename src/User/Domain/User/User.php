<?php

declare(strict_types=1);

namespace App\User\Domain\User;

use App\Common\Domain\Aggregate;
use App\User\Domain\User\Event\UserRegistered;

final class User extends Aggregate
{
    private string $id;
    private Email $email;
    private Password $password;
    private string $name;
    private Confirmation $confirmation;

    private function __construct(UserId $id, Email $email, Password $password, string $name, Confirmation $confirmation)
    {
        $this->id = $id->getValue();
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->confirmation = $confirmation;
    }

    public static function registration(UserId $id, Email $email, Password $password, string $name, Confirmation $confirmation): User
    {
        $user = new User($id, $email, $password, $name, $confirmation);
        $user->recordThat(new UserRegistered($user));

        return $user;
    }

    public function getId(): UserId
    {
        return new UserId($this->id);
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getConfirmation(): Confirmation
    {
        return $this->confirmation;
    }
}
