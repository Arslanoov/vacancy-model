<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy;

use Webmozart\Assert\Assert;

final class Image
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'Image path can\'t be empty.');
        Assert::lengthBetween($value, 1, 255, 'Too long image path.');
        $this->value = $value;
    }

    public function getPath(): string
    {
        return $this->value;
    }
}
