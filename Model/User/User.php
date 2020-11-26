<?php

declare(strict_types=1);

namespace Domain\Model\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_users", uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"username"})
 * })
 */
final class User
{
    /**
     * @var Id
     * @ORM\Id()
     * @ORM\Column(type="user_user_id")
     */
    private Id $id;
    /**
     * @var Username
     * @ORM\Column(type="user_user_username", length=32)
     */
    private Username $username;
    /**
     * @var Password
     * @ORM\Column(type="user_user_password")
     */
    private Password $password;
    /**
     * @var Role
     * @ORM\Column(type="user_user_role", length=12)
     */
    private Role $role;

    public function __construct(Id $id, Username $username, Password $password, Role $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public static function signUp(Username $username, Password $password, Role $role): self
    {
        return new self(Id::asUuid4(), $username, $password, $role);
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }
}
