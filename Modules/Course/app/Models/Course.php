<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\Category\Models\Category;
use Modules\Comment\Models\CourseComment;
use Modules\Course\Database\factories\CourseFactory;
use Modules\User\app\Models\User;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'price',
        'discount',
        'description',
        'level',
        'status',
        'video',
        'viewed',
        'sold',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }

    public function lessons(): HasManyThrough
    {
        return $this->hasManyThrough(Lesson::class, Season::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CourseComment::class);
    }

    public function courseLevelTranslator($level)
    {
        switch ($level){
            case 'professional': return "حرفه ای";
            break;
            case 'medium': return "متوسط";
                break;
            case 'easy': return "ساده";
                break;
        }
    }
    protected static function newFactory()
    {
        //return CourseFactory::new();
    }
}
