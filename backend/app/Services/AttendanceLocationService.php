<?php

namespace App\Services;

use App\Contracts\Repositories\AttendanceLocationRepositoryInterface;
use App\Contracts\Services\AttendanceLocationServiceInterface;

class AttendanceLocationService extends BaseService implements AttendanceLocationServiceInterface
{
    public function __construct(AttendanceLocationRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
