<?php

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Comment\Database\factories\CourseCommentFactory;
use Modules\Course\Models\Course;
use Modules\User\app\Models\User;

class CourseComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'text',
        'like',
        'dislike',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
       return $this->belongsTo(Course::class);
    }

    protected static function newFactory()
    {
        //return CourseCommentFactory::new();
    }
}
