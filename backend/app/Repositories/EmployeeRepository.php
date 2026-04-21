<?php

namespace App\Repositories;

use App\Contracts\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    protected array $with = ['user', 'division', 'position'];

    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }
}
