<?php

declare(strict_types=1);

namespace Domain\Model\User\UseCase\SignUp;

use Symfony\Component\Validator\Constraints as Assert;

final class Command
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="4", max="32")
     */
    public string $username;
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max="32")
     */
    public string $password;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $role;

    public function __construct(string $username, string $password, string $role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
}
