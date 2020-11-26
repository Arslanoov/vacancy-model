<?php

declare(strict_types=1);

namespace Domain\Model\User\Service;

interface PasswordValidator
{
    /**
     * @param string $password
     * @param string $hash
     */
    public function validate(string $password, string $hash): void;
}
