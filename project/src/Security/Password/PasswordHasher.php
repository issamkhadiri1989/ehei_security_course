<?php

declare(strict_types=1);

namespace App\Security\Password;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final readonly class PasswordHasher
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function hashPasswordForUser(User $user, #[\SensitiveParameter] string $password): string
    {
        return $this->hasher->hashPassword($user, $password);
    }
}
