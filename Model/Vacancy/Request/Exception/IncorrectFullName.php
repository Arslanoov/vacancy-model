<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request\Exception;

use Domain\Model\DomainException;
use Throwable;

final class IncorrectFullName extends DomainException
{
    public function __construct(string $message = "Incorrect full name.", int $code = 419, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
