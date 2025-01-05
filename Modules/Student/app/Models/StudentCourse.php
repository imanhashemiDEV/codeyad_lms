<?php

namespace Modules\Student\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Course\Models\Course;
use Modules\Student\Database\factories\StudentCourseFactory;
use Modules\User\app\Models\User;

class StudentCourse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'course_id'
    ];

    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    protected static function newFactory(): StudentCourseFactory
    {
        //return StudentCourseFactory::new();
    }
}
