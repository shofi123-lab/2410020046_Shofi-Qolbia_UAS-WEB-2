<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'pengalaman',
        'nomor_hp',
    ];

    /**
     * Get the yoga classes for the instructor.
     */
    public function yogaClasses(): HasMany
    {
        return $this->hasMany(YogaClass::class, 'instructor_id');
    }
}
