<?php

namespace App\Repositories;

use App\Contracts\Repositories\PerformanceReviewRepositoryInterface;
use App\Models\PerformanceReview;

class PerformanceReviewRepository extends BaseRepository implements PerformanceReviewRepositoryInterface
{
    protected array $with = ['employee', 'reviewer'];

    public function __construct(PerformanceReview $model)
    {
        parent::__construct($model);
    }
}
