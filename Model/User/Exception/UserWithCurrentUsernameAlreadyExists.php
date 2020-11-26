<?php

declare(strict_types=1);

namespace Domain\Model\User\Exception;

use Domain\Model\DomainException;
use Throwable;

final class UserWithCurrentUsernameAlreadyExists extends DomainException
{
    public function __construct(
        string $message = "User with current username already exists.",
        int $code = 419,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
