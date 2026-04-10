<?php

namespace App\Services;

use App\Contracts\Repositories\JobVacancyRepositoryInterface;
use App\Contracts\Services\JobVacancyServiceInterface;

class JobVacancyService extends BaseService implements JobVacancyServiceInterface
{
    public function __construct(JobVacancyRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
