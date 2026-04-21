<?php

namespace App\Repositories;

use App\Contracts\Repositories\ShiftRepositoryInterface;
use App\Models\Shift;

class ShiftRepository extends BaseRepository implements ShiftRepositoryInterface
{
    public function __construct(Shift $model)
    {
        parent::__construct($model);
    }
}
