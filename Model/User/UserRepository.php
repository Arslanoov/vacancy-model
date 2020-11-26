<?php

declare(strict_types=1);

namespace Domain\Model\User;

interface UserRepository
{
    public function existsByUsername(Username $username): bool;

    public function add(User $user): void;
}
