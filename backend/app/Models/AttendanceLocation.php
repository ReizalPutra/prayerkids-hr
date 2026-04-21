<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceLocation extends Model
{
    use HasFactory, SoftDeletes, UsesUuid;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'radius_meter',
        'qr_token',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'location_id');
    }
}
