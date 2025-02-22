<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseSession extends Model
{
    /** @use HasFactory<\Database\Factories\CourseSessionFactory> */
    use HasFactory;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'session',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function courseStudents(): hasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
