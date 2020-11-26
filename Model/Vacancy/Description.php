<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy;

use Webmozart\Assert\Assert;

final class Description
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::maxLength($value, 255, 'Vacancy description length must not exceed 255 characters.');
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
