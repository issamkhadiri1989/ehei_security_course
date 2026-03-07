<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity(entityClass: User::class, fields: ['email'])]
class RegistrationRequest
{
    public string $fullName;
    public string $email;
    public string $phone;
    public string $password;
}
