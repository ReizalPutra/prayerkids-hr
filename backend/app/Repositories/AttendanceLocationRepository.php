<?php

namespace App\Repositories;

use App\Contracts\Repositories\AttendanceLocationRepositoryInterface;
use App\Models\AttendanceLocation;

class AttendanceLocationRepository extends BaseRepository implements AttendanceLocationRepositoryInterface
{
    public function __construct(AttendanceLocation $model)
    {
        parent::__construct($model);
    }
}
