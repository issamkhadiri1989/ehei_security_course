<?php

declare(strict_types=1);

namespace App\Account\Factory;

use App\DTO\RegistrationRequest;
use App\Entity\User;

abstract class AbstractAccountFactory
{
    abstract public function createUserInstance(RegistrationRequest $registrationRequest): User;
}
