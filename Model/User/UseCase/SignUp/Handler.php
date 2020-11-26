<?php

declare(strict_types=1);

namespace Domain\Model\User\UseCase\SignUp;

use Domain\Model\FlusherInterface;
use Domain\Model\User\Exception\UserWithCurrentUsernameAlreadyExists;
use Domain\Model\User\Password;
use Domain\Model\User\Role;
use Domain\Model\User\Service\PasswordHasher;
use Domain\Model\User\User;
use Domain\Model\User\Username;
use Domain\Model\User\UserRepository;

final class Handler
{
    private UserRepository $users;
    private FlusherInterface $flusher;
    private PasswordHasher $hasher;

    public function __construct(UserRepository $users, FlusherInterface $flusher, PasswordHasher $hasher)
    {
        $this->users = $users;
        $this->flusher = $flusher;
        $this->hasher = $hasher;
    }

    public function handle(Command $command): void
    {
        if ($this->users->existsByUsername($username = new Username($command->username))) {
            throw new UserWithCurrentUsernameAlreadyExists();
        }

        $user = User::signUp(
            $username,
            new Password($this->hasher->hash($command->password)),
            new Role($command->role)
        );

        $this->users->add($user);

        $this->flusher->flush();
    }
}
