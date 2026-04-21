<?php

namespace App\Services;

use App\Contracts\Repositories\ShiftRepositoryInterface;
use App\Contracts\Services\ShiftServiceInterface;

class ShiftService extends BaseService implements ShiftServiceInterface
{
    public function __construct(ShiftRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
