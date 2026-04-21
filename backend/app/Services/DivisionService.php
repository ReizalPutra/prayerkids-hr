<?php

namespace App\Services;

use App\Contracts\Repositories\DivisionRepositoryInterface;
use App\Contracts\Services\DivisionServiceInterface;

class DivisionService extends BaseService implements DivisionServiceInterface
{
    public function __construct(DivisionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
