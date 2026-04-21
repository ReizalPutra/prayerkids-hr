<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use UsesUuid;

    protected $fillable = [
        'employee_id',
        'shift_id',
        'location_id',
        'date',
        'clock_in',
        'clock_out',
        'status',
        'late_minutes',
        'check_in_lat',
        'check_in_long',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(AttendanceLocation::class, 'location_id');
    }
}
