<?php

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Comment\Database\factories\UserCommentVoteFactory;
use Modules\User\app\Models\User;

class UserCommentVote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'course_comment_id',
        'type'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function courseComment(): BelongsTo
    {
        return $this->belongsTo(CourseComment::class);
    }

    protected static function newFactory()
    {
        //return UserCommentVoteFactory::new();
    }
}
