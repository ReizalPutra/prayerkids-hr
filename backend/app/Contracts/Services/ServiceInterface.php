<?php

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ServiceInterface
{
    public function getAll(): Collection;

    public function create(array $data): Model;

    public function show(Model $model): Model;

    public function update(Model $model, array $data): Model;

    public function delete(Model $model): Model;
}
