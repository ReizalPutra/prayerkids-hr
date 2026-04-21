<?php

namespace App\Repositories;

use App\Contracts\Repositories\JobVacancyRepositoryInterface;
use App\Models\JobVacancy;

class JobVacancyRepository extends BaseRepository implements JobVacancyRepositoryInterface
{
    protected array $with = ['position'];

    public function __construct(JobVacancy $model)
    {
        parent::__construct($model);
    }
}
