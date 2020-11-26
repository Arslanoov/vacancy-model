<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Exception;

use Domain\Model\DomainException;
use Throwable;

final class VacancyNotFound extends DomainException
{
    public function __construct(string $message = "Vacancy not found.", int $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
