<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

use Webmozart\Assert\Assert;

final class Gender
{
    private const GENDERS = [
        self::GENDER_MALE,
        self::GENDER_FEMALE
    ];

    private const GENDER_MALE = 'Male';
    private const GENDER_FEMALE = 'Female';

    private string $value;

    public function __construct(string $value)
    {
        Assert::oneOf($value, self::GENDERS, 'Incorrect gender.');
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isMale(): bool
    {
        return $this->getValue() === self::GENDER_MALE;
    }

    public function isFemale(): bool
    {
        return $this->getValue() === self::GENDER_FEMALE;
    }

    public static function male(): self
    {
        return new self(self::GENDER_MALE);
    }

    public static function female(): self
    {
        return new self(self::GENDER_FEMALE);
    }
}
