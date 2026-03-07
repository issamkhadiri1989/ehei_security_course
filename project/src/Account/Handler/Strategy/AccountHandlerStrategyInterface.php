<?php

declare(strict_types=1);

namespace App\Account\Handler\Strategy;

use App\Entity\User;

interface AccountHandlerStrategyInterface
{
    /**
     * Creates new user's account.
     */
    public function create(User $account): User;

    /**
     * Updates an existing account.
     */
    public function update(User $account): User;

    /**
     * Performs prohibition of an existing account.
     */
    public function ban(User $account): User;

    /**
     * Reactivate an existing account.
     */
    public function unban(User $account): User;
}
