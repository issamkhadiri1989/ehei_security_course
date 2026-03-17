<?php

declare(strict_types=1);

namespace App\Account\Handler;

use App\Account\Handler\Strategy\AccountHandlerStrategyInterface;
use App\Entity\User;

final readonly class AccountHandler
{
    public function __construct(private AccountHandlerStrategyInterface $strategy)
    {
    }

    public function save(User $user, bool $new = false): User
    {
        if (true === $new) {
            $this->strategy->create($user);
        } else {
            $this->strategy->update($user);
        }

        return $user;
    }

    public function activate(User $userAccount): User
    {
        $this->strategy->unban($userAccount);

        return $userAccount;
    }

    public function deactivate(User $userAccount): User
    {
        $this->strategy->ban($userAccount);

        return $userAccount;
    }
}
