<?php

namespace App\Repositories;

use App\Contracts\Repositories\ApplicantRepositoryInterface;
use App\Models\Applicant;

class ApplicantRepository extends BaseRepository implements ApplicantRepositoryInterface
{
    protected array $with = ['jobVacancy'];

    public function __construct(Applicant $model)
    {
        parent::__construct($model);
    }
}
