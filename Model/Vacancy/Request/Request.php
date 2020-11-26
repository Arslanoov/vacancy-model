<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

use Doctrine\ORM\Mapping as ORM;
use Domain\Model\Vacancy\Vacancy;

/**
 * Class Request
 * @package Domain\Model\Vacancy\Request
 * @ORM\Entity()
 * @ORM\Table(name="vacancy_vacancy_requests")
 */
final class Request
{
    /**
     * @var Id
     * @ORM\Id()
     * @ORM\Column(type="vacancy_vacancy_request_id")
     */
    private Id $id;
    /**
     * @var Vacancy
     * @ORM\ManyToOne(targetEntity="Domain\Model\Vacancy\Vacancy", inversedBy="requests")
     * @ORM\JoinColumn(name="vacancy_id", referencedColumnName="id", nullable=false)
     */
    private Vacancy $vacancy;
    /**
     * @var FullName
     * @ORM\Embedded(class="Domain\Model\Vacancy\Request\FullName", columnPrefix="full_name_")
     */
    private FullName $fullName;
    /**
     * @var BirthdayDate
     * @ORM\Embedded(class="Domain\Model\Vacancy\Request\BirthdayDate", columnPrefix="birthday_date_")
     */
    private BirthdayDate $birthdayDate;
    /**
     * @var ContactPhone
     * @ORM\Column(type="vacancy_vacancy_request_contact_phone", name="contact_phone", length=15)
     */
    private ContactPhone $contactPhone;
    /**
     * @var Email|null
     * @ORM\Column(type="vacancy_vacancy_request_email", length=32, nullable=true)
     */
    private ?Email $email;
    /**
     * @var Gender|null
     * @ORM\Column(type="vacancy_vacancy_request_gender", length=7, nullable=true)
     */
    private ?Gender $gender;
    /**
     * @var Resume|null
     * @ORM\Embedded(class="Domain\Model\Vacancy\Request\Resume", columnPrefix="resume_")
     */
    private ?Resume $resume;

    public function __construct(
        Id $id,
        Vacancy $vacancy,
        FullName $fullName,
        BirthdayDate $birthdayDate,
        ContactPhone $contactPhone,
        ?Email $email = null,
        ?Gender $gender = null,
        ?Resume $resume = null
    ) {
        $this->id = $id;
        $this->vacancy = $vacancy;
        $this->fullName = $fullName;
        $this->birthdayDate = $birthdayDate;
        $this->contactPhone = $contactPhone;
        $this->email = $email;
        $this->gender = $gender;
        $this->resume = $resume;
    }

    public static function new(
        Vacancy $vacancy,
        FullName $fullName,
        BirthdayDate $birthdayDate,
        ContactPhone $contactPhone,
        ?Email $email = null,
        ?Gender $gender = null,
        ?Resume $resume = null
    ): self {
        return new self(
            Id::asUuid4(),
            $vacancy,
            $fullName,
            $birthdayDate,
            $contactPhone,
            $email,
            $gender,
            $resume
        );
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getVacancy(): Vacancy
    {
        return $this->vacancy;
    }

    public function getFullName(): FullName
    {
        return $this->fullName;
    }

    public function getBirthdayDate(): BirthdayDate
    {
        return $this->birthdayDate;
    }

    public function getContactPhone(): ContactPhone
    {
        return $this->contactPhone;
    }

    public function getEmail(): ?Email
    {
        return $this->email;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function getResume(): ?Resume
    {
        return $this->resume;
    }
}
