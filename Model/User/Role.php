<?php

declare(strict_types=1);

namespace Domain\Model\User;

use Webmozart\Assert\Assert;

final class Role
{
    public const ROLES = [
        self::ROLE_USER,
        self::ROLE_ADMIN
    ];

    public const ROLE_USER = 'User';
    public const ROLE_ADMIN = 'Admin';

    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value, 'User role required.');
        Assert::oneOf($value, self::ROLES, 'Incorrect user role.');
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isUser(): bool
    {
        return $this->getValue() === self::ROLE_USER;
    }

    public function isAdmin(): bool
    {
        return $this->getValue() === self::ROLE_ADMIN;
    }

    public function isEqual(Role $role): bool
    {
        return $this->getValue() === $role->getValue();
    }

    public static function user(): self
    {
        return new self(self::ROLE_USER);
    }

    public static function admin(): self
    {
        return new self(self::ROLE_ADMIN);
    }
}
