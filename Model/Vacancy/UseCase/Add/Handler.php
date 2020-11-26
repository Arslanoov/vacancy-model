<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\UseCase\Add;

use Domain\Model\FlusherInterface;
use Domain\Model\Vacancy\Description;
use Domain\Model\Vacancy\Image;
use Domain\Model\Vacancy\Name;
use Domain\Model\Vacancy\Vacancy;
use Domain\Model\Vacancy\VacancyRepository;

final class Handler
{
    private VacancyRepository $vacancies;
    private FlusherInterface $flusher;

    public function __construct(VacancyRepository $vacancies, FlusherInterface $flusher)
    {
        $this->vacancies = $vacancies;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void
    {
        $vacancy = Vacancy::new(
            new Name($command->name),
            $command->description ? new Description($command->description) : null,
            $command->image ? new Image($command->image) : null
        );

        $this->vacancies->add($vacancy);

        $this->flusher->flush();
    }
}
