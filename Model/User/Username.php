<?php

declare(strict_types=1);

namespace Domain\Model\User;

use Webmozart\Assert\Assert;

final class Username
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'Username required.');
        Assert::lengthBetween($value, 4, 32, 'Username must be between 4 and 32 chars length.');

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Username $username): bool
    {
        return $username->getValue() === $this->getValue();
    }
}
