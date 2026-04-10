<?php

namespace App\Services;

use App\Contracts\Repositories\PerformanceReviewRepositoryInterface;
use App\Contracts\Services\PerformanceReviewServiceInterface;

class PerformanceReviewService extends BaseService implements PerformanceReviewServiceInterface
{
    public function __construct(PerformanceReviewRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
