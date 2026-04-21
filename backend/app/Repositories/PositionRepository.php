<?php

namespace App\Repositories;

use App\Contracts\Repositories\PositionRepositoryInterface;
use App\Models\Position;

class PositionRepository extends BaseRepository implements PositionRepositoryInterface
{
    public function __construct(Position $model)
    {
        parent::__construct($model);
    }
}
