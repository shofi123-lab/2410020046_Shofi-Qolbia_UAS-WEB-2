<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'yoga_class_id',
        'hari',
        'jam',
        'status',
    ];

    /**
     * Get the yoga class that owns the schedule.
     */
    public function yogaClass(): BelongsTo
    {
        return $this->belongsTo(YogaClass::class, 'yoga_class_id');
    }
}
