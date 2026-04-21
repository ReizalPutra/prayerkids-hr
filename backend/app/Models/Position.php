<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes, UsesUuid;
    protected $fillable = [
        'title',
        'base_salary'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
