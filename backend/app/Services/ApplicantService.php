<?php

namespace App\Services;

use App\Contracts\Repositories\ApplicantRepositoryInterface;
use App\Contracts\Services\ApplicantServiceInterface;

class ApplicantService extends BaseService implements ApplicantServiceInterface
{
    public function __construct(ApplicantRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
