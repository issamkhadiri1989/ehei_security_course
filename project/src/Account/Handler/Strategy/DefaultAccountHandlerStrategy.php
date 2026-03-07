<?php

declare(strict_types=1);

namespace App\Account\Handler\Strategy;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

final readonly class DefaultAccountHandlerStrategy implements AccountHandlerStrategyInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function create(User $account): User
    {
        $this->entityManager->persist($account);
        $this->entityManager->flush();

        return $account;
    }

    public function update(User $account): User
    {
        $this->entityManager->flush();

        return $account;
    }

    public function ban(User $account): User
    {
        // ... do some logic to mark the account as prohibit

        return $account;
    }

    public function unban(User $account): User
    {
        // ... do some logic to unlock the user's account

        return $account;
    }
}
