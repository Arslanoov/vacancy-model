<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\Request;

interface VacancyRequestRepository
{
    public function add(Request $request): void;
}
