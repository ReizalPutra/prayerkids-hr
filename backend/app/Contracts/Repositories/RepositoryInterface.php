<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Model;

    public function loadRelations(Model $model): Model;

    public function update(Model $model, array $data): Model;

    public function delete(Model $model): bool;
}
