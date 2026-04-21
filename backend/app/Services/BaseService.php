<?php

namespace App\Services;

use App\Contracts\Repositories\RepositoryInterface;
use App\Contracts\Services\ServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService implements ServiceInterface
{
    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
        return $this->repository->all();
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function show(Model $model): Model
    {
        return $this->repository->loadRelations($model);
    }

    public function update(Model $model, array $data): Model
    {
        return $this->repository->update($model, $data);
    }

    public function delete(Model $model): Model
    {
        $this->repository->delete($model);

        return $model;
    }
}
