<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Models\Category;
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

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    protected static function newFactory(): CourseFactory
    {
        //return CourseFactory::new();
    }
}
