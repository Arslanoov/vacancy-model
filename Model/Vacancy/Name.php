<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy;

use Webmozart\Assert\Assert;

final class Name
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'Vacancy name required.');
        Assert::lengthBetween($value, 2, 16, 'Vacancy name must be between 2 and 16 chars length.');
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Name $name): bool
    {
        return $this->getValue() === $name->getValue();
    }
}
