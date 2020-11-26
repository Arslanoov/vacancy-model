<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy;

use Domain\Model\Vacancy\Exception\VacancyNotFound;

interface VacancyRepository
{
    /**
     * @param Id $id
     * @return Vacancy
     * @throws VacancyNotFound
     */
    public function getById(Id $id): Vacancy;

    public function getList(): array;

    public function add(Vacancy $vacancy): void;
}
