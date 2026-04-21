<?php

namespace App\Repositories;

use App\Contracts\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    /**
     * @var array<int, string>
     */
    protected array $with = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->newQuery()->with($this->with)->get();
    }

    public function create(array $data): Model
    {
        $model = $this->model->create($data);

        return $this->freshWithRelations($model);
    }

    public function loadRelations(Model $model): Model
    {
        if ($this->with !== []) {
            $model->load($this->with);
        }

        return $model;
    }

    public function update(Model $model, array $data): Model
    {
        $model->update($data);

        return $this->freshWithRelations($model);
    }

    public function delete(Model $model): bool
    {
        return (bool) $model->delete();
    }

    protected function freshWithRelations(Model $model): Model
    {
        $model->refresh();

        return $this->loadRelations($model);
    }
}
