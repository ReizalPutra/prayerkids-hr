<?php

namespace App\Services;

use App\Contracts\Repositories\PositionRepositoryInterface;
use App\Contracts\Services\PositionServiceInterface;

class PositionService extends BaseService implements PositionServiceInterface
{
    public function __construct(PositionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
