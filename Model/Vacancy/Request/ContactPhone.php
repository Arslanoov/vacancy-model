<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

use Webmozart\Assert\Assert;

final class ContactPhone
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'Contact phone required.');
        Assert::regex($value, '/^[0-9\-\(\)\/\+\s]*$/', 'Incorrect contact phone.');
        Assert::lengthBetween($value, 6, 15, 'Contact phone must be between 6 and 15 chars length.');
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(ContactPhone $phone): bool
    {
        return $this->value === $phone->getValue();
    }
}
