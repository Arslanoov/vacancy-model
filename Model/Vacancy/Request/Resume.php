<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

/**
 * Class Resume
 * @package Domain\Model\Vacancy\Request
 * @ORM\Embeddable()
 */
final class Resume
{
    public const TYPES = [
        self::TYPE_LINK,
        self::TYPE_FILE
    ];

    public const TYPE_LINK = 'Link';
    public const TYPE_FILE = 'File';

    /**
     * @var string
     * @ORM\Column(type="string", name="type", nullable=true)
     */
    private string $type;
    /**
     * @var string
     * @ORM\Column(type="string", name="value", nullable=true)
     */
    private string $value;

    public function __construct(string $type, string $value)
    {
        Assert::oneOf($type, self::TYPES, 'Incorrect resume type.');
        $this->type = $type;
        Assert::notEmpty($value, 'Incorrect resume.');
        $this->value = $value;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isLink(): bool
    {
        return $this->type === self::TYPE_LINK;
    }

    public function isFile(): bool
    {
        return $this->type === self::TYPE_FILE;
    }
}
