<?php

namespace App\Services;

use App\Contracts\Repositories\EmployeeRepositoryInterface;
use App\Contracts\Services\EmployeeServiceInterface;

class EmployeeService extends BaseService implements EmployeeServiceInterface
{
    public function __construct(EmployeeRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
