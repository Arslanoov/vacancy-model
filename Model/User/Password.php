<?php

declare(strict_types=1);

namespace Domain\Model\User;

use Webmozart\Assert\Assert;

final class Password
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'User password required.');

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Password $password): bool
    {
        return $password->getValue() === $this->getValue();
    }
}
