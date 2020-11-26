<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request\Exception;

use Domain\Model\DomainException;
use Throwable;

final class IncorrectBirthdayDate extends DomainException
{
    public function __construct(
        string $message = "Incorrect birthday date.",
        int $code = 419,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
