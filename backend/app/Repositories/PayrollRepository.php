<?php

namespace App\Repositories;

use App\Contracts\Repositories\PayrollRepositoryInterface;
use App\Models\Payroll;

class PayrollRepository extends BaseRepository implements PayrollRepositoryInterface
{
    protected array $with = ['employee'];

    public function __construct(Payroll $model)
    {
        parent::__construct($model);
    }
}
