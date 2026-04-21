<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContractTemplateRepositoryInterface;
use App\Models\ContractTemplate;

class ContractTemplateRepository extends BaseRepository implements ContractTemplateRepositoryInterface
{
    public function __construct(ContractTemplate $model)
    {
        parent::__construct($model);
    }
}
