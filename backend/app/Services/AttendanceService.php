<?php

namespace App\Services;

use App\Contracts\Repositories\AttendanceRepositoryInterface;
use App\Contracts\Services\AttendanceServiceInterface;

class AttendanceService extends BaseService implements AttendanceServiceInterface
{
    public function __construct(AttendanceRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
