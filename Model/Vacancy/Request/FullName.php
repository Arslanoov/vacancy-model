<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

use Doctrine\ORM\Mapping as ORM;
use Domain\Model\Vacancy\Request\Exception\IncorrectFullName;
use Webmozart\Assert\Assert;

/**
 * Class FullName
 * @package Domain\Model\Vacancy\Request
 * @ORM\Embeddable()
 */
final class FullName
{
    /**
     * @var string
     * @ORM\Column(type="string", name="name")
     */
    private string $name;
    /**
     * @var string
     * @ORM\Column(type="string", name="surname")
     */
    private string $surname;
    /**
     * @var string
     * @ORM\Column(type="string", name="patronymic")
     */
    private string $patronymic;

    public function __construct(string $name, string $surname, string $patronymic)
    {
        Assert::notEmpty($name, 'Name required.');
        $this->name = $name;
        Assert::notEmpty($surname, 'Surname required.');
        $this->surname = $surname;
        Assert::notEmpty($patronymic, 'Patronymic required.');
        $this->patronymic = $patronymic;
    }

    public static function fromOneString(string $fullName): self
    {
        Assert::notEmpty($fullName, 'Full name required.');

        if (count($pieces = explode(' ', $fullName)) !== 3) {
            throw new IncorrectFullName();
        }

        return new self($pieces[1], $pieces[0], $pieces[2]);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function isEqual(FullName $fullName): bool
    {
        return
            $this->getName() === $fullName->getName() &&
            $this->getSurname() === $fullName->getSurname() &&
            $this->getPatronymic() === $fullName->getPatronymic()
        ;
    }
}
