<?php

namespace App\Repositories;

use App\Contracts\Repositories\AttendanceRepositoryInterface;
use App\Models\Attendance;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{
    protected array $with = ['employee', 'shift', 'location'];

    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }
}
