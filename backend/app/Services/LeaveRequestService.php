<?php

namespace App\Services;

use App\Contracts\Repositories\LeaveRequestRepositoryInterface;
use App\Contracts\Services\LeaveRequestServiceInterface;

class LeaveRequestService extends BaseService implements LeaveRequestServiceInterface
{
    public function __construct(LeaveRequestRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
