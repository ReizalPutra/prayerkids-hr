<?php

namespace App\Services;

use App\Contracts\Repositories\PayrollRepositoryInterface;
use App\Contracts\Services\PayrollServiceInterface;

class PayrollService extends BaseService implements PayrollServiceInterface
{
    public function __construct(PayrollRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
