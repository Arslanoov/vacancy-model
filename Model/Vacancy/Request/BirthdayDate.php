<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Domain\Model\Vacancy\Request\Exception\IncorrectBirthdayDate;
use Exception;
use Webmozart\Assert\Assert;

/**
 * Class BirthdayDate
 * @package Domain\Model\Vacancy\Request
 * @ORM\Embeddable()
 */
final class BirthdayDate
{
    /**
     * @var int
     * @ORM\Column(type="integer", name="day")
     */
    private int $day;
    /**
     * @var int
     * @ORM\Column(type="integer", name="month")
     */
    private int $month;
    /**
     * @var int
     * @ORM\Column(type="integer", name="year")
     */
    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        Assert::greaterThanEq($day, 0, 'Incorrect day.');
        Assert::lessThanEq($day, 31, 'Incorrect day.');
        $this->day = $day;
        Assert::greaterThanEq($month, 0, 'Incorrect month.');
        Assert::lessThanEq($month, 12, 'Incorrect month.');
        $this->month = $month;
        Assert::greaterThanEq($year, 1900, 'Incorrect year.');
        Assert::lessThanEq($year, 2020, 'Incorrect year.');
        $this->year = $year;
    }

    public static function fromOneString(string $birthdayDate): self
    {
        if (count($pieces = explode('.', $birthdayDate)) !== 3) {
            throw new IncorrectBirthdayDate();
        }

        return new self(
            (int) $pieces[0],
            (int) $pieces[1],
            (int) $pieces[2]
        );
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getFormatted(): DateTimeImmutable
    {
        try {
            return new DateTimeImmutable($this->getYear() . '-' . $this->getMonth() . '-' . $this->getDay());
        } catch (Exception $e) {
            throw new IncorrectBirthdayDate();
        }
    }

    public function isEqual(BirthdayDate $date): bool
    {
        return
            $this->getDay() === $date->getDay() &&
            $this->getMonth() === $date->getMonth() &&
            $this->getYear() === $date->getYear()
        ;
    }
}
