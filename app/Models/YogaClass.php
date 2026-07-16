<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class YogaClass extends Model
{
    use HasFactory;

    protected $table = 'yoga_classes';

    protected $fillable = [
        'nama_kelas',
        'level',
        'durasi',
        'instructor_id',
        'deskripsi',
    ];

    /**
     * Get the instructor that owns the yoga class.
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    /**
     * Get the schedules for the yoga class.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'yoga_class_id');
    }
}
