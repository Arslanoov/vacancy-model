<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

use Webmozart\Assert\Assert;

final class Email
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'Email required.');
        Assert::lengthBetween($value, 5, 32, 'Email must be between 5 and 32 chars length.');
        Assert::email($value, 'Incorrect email.');
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Email $email): bool
    {
        return $this->getValue() === $email->getValue();
    }
}
