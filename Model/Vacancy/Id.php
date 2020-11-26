<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy;

use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

final class Id
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'Vacancy id required.');
        Assert::uuid($value, 'Vacancy id must be uuid.');
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function asUuid4(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function isEqual(Id $id): bool
    {
        return $this->getValue() === $id->getValue();
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
