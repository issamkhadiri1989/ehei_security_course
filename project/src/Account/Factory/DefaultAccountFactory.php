<?php

declare(strict_types=1);

namespace App\Account\Factory;

use App\DTO\RegistrationRequest;
use App\Entity\User;
use App\Security\Password\PasswordHasher;

final class DefaultAccountFactory extends AbstractAccountFactory
{
    public function __construct(private readonly PasswordHasher $passwordHasher)
    {
    }

    public function createUserInstance(RegistrationRequest $registrationRequest): User
    {
        $account = new User();

        $account->setEmail($registrationRequest->email)
            ->setFullName($registrationRequest->fullName)
            ->setPhoneNumber($registrationRequest->phone);

        $account->setPassword($this->passwordHasher->hashPasswordForUser(
            $account,
            $registrationRequest->password,
        ));

        return $account;
    }
}
