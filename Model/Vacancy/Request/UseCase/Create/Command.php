<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request\UseCase\Create;

use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Validator\Constraints as Assert;

final class Command
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $vacancyId;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $fullName;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    public string $birthdayDate;
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="6", max="15")
     */
    public string $contactPhone;
    /**
     * @var string
     * @Assert\NotBlank()
     * @Recaptcha3()
     */
    public string $captcha;
    /**
     * @var string|null
     * @Assert\Email()
     */
    public ?string $email = null;
    public ?string $gender = null;
    public ?string $resume = null;
    public ?string $resumeType = null;

    public function __construct(
        string $vacancyId,
        string $fullName,
        string $birthdayDate,
        string $contactPhone,
        string $captcha,
        ?string $email,
        ?string $gender,
        ?string $resume,
        ?string $resumeType
    ) {
        $this->vacancyId = $vacancyId;
        $this->fullName = $fullName;
        $this->birthdayDate = $birthdayDate;
        $this->contactPhone = $contactPhone;
        $this->captcha = $captcha;
        $this->email = $email;
        $this->gender = $gender;
        $this->resume = $resume;
        $this->resumeType = $resumeType;
    }
}
