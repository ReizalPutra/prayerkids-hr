<?php

namespace App\Repositories;

use App\Contracts\Repositories\LeaveRequestRepositoryInterface;
use App\Models\LeaveRequest;

class LeaveRequestRepository extends BaseRepository implements LeaveRequestRepositoryInterface
{
    protected array $with = ['employee'];

    public function __construct(LeaveRequest $model)
    {
        parent::__construct($model);
    }
}
