<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request\UseCase\Create;

use Domain\Model\FlusherInterface;
use Domain\Model\Vacancy\Id as VacancyId;
use Domain\Model\Vacancy\Request\BirthdayDate;
use Domain\Model\Vacancy\Request\ContactPhone;
use Domain\Model\Vacancy\Request\Email;
use Domain\Model\Vacancy\Request\Exception\IncorrectResumeType;
use Domain\Model\Vacancy\Request\FullName;
use Domain\Model\Vacancy\Request\Gender;
use Domain\Model\Vacancy\Request\Request;
use Domain\Model\Vacancy\Request\Resume;
use Domain\Model\Vacancy\Request\VacancyRequestRepository;
use Domain\Model\Vacancy\VacancyRepository;

final class Handler
{
    private VacancyRepository $vacancies;
    private VacancyRequestRepository $requests;
    private FlusherInterface $flusher;

    public function __construct(
        VacancyRepository $vacancies,
        VacancyRequestRepository $requests,
        FlusherInterface $flusher
    ) {
        $this->vacancies = $vacancies;
        $this->requests = $requests;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void
    {
        $vacancy = $this->vacancies->getById(new VacancyId($command->vacancyId));

        if ($command->resume && !$command->resumeType) {
            throw new IncorrectResumeType();
        }

        $request = Request::new(
            $vacancy,
            FullName::fromOneString($command->fullName),
            BirthdayDate::fromOneString($command->birthdayDate),
            new ContactPhone($command->contactPhone),
            $command->email ? new Email($command->email) : null,
            $command->gender ? new Gender($command->gender) : null,
            $command->resume ? new Resume($command->resumeType, $command->resume) : null
        );

        $this->requests->add($request);

        $this->flusher->flush();
    }
}
