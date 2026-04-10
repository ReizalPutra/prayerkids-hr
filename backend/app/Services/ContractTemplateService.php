<?php

namespace App\Services;

use App\Contracts\Repositories\ContractTemplateRepositoryInterface;
use App\Contracts\Services\ContractTemplateServiceInterface;

class ContractTemplateService extends BaseService implements ContractTemplateServiceInterface
{
    public function __construct(ContractTemplateRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
