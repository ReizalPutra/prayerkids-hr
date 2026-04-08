<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

trait UsesUuid
{
    use HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';
}
