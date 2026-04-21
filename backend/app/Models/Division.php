<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use SoftDeletes, HasFactory, UsesUuid;
    protected $fillable = ['name', 'description'];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
