<?php

namespace App\Repositories;

use App\Contracts\Repositories\DivisionRepositoryInterface;
use App\Models\Division;

class DivisionRepository extends BaseRepository implements DivisionRepositoryInterface
{
    public function __construct(Division $model)
    {
        parent::__construct($model);
    }
}
